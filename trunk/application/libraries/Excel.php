<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel {
	var $_active_worksheet;
	var $CI;
	var $_dom;
	var $_smart_typing;
	var $_styles;
	var $_worksheets;
	var $_worksheet_names;
	
	/**
	 * Default constructor. Sets default values and creates the dom object.
	 * 
	 * @author Daniel Razafsky
	 * @return void
	 */
	function Excel() {
		$this->CI =& get_instance();
		$this->CI->load->helper('dom');
		
		$this->_active_worksheet 	= null;
		$this->_smart_typing		= FALSE;
		$this->_styles 				= array();
		$this->_worksheet_names 	= array();
		
		// This requires that we load dom_helper before we load this class
		$this->_dom = new_xml_dom();
	}
	
	/**
	 * Convert an alpha column name into an integer column number.
	 * 
	 * @params $alpha : string - The alpha column name
	 * @author Daniel Razafsky
	 * @return The numeric value of an alpha column name.
	 */
	function alpha_to_number($alpha) {
		$numeric_col = 0;
		$alpha = strtoupper($alpha);
		
		for($x = 0, $len = strlen($alpha); $x < $len; $x++) {
			$numeric_col *= 26;
			$numeric_col += (ord(substr($alpha, $x, 1)) - ord('A') + 1);
		}
		
		return $numeric_col;
	}
	
	/**
	 * Get or set the value of a cell.
	 * 
	 * @params $cell : string - The alphanumeric cell name.
	 * @author Daniel Razafsky
	 * @return If $value is null, returns the value of the cell if it has been set or FALSE if it has not been set. If $value is not null, returns TRUE;
	 */
	function cell($cell, $value = null) {
		if(!preg_match("/^[a-zA-Z]{1,}[0-9]{1,}$/", $cell, $matches)) { // Make sure it's a valid cell
			return FALSE;
		}
		
		list($row, $col) = $this->_split_cell($cell);
		
		// Now convert the column into a numeric value
		$col = $this->alpha_to_number($col);
		if(is_null($value)) { // Did they want the value of the cell?
			return isset($this->_active_worksheet->cells['row'][$row]['col'][$col]['data']) ? $this->_active_worksheet->cells['row'][$row]['col'][$col]['data'] : FALSE;
		}
		
		// Set the data and delete the formula.  We don't really want to output both a data value and a formula for the same cell.
		$this->_active_worksheet->cells['row'][$row]['col'][$col]['data'] = $value;
		$this->_active_worksheet->cells['row'][$row]['col'][$col]['formula'] = null;
		
		// If predictive typing is enabled, add a type attribute based on a best guess.
		if(TRUE === $this->_smart_typing) {
			$type = null;
			
			// Determine what the type of value is so that Excel doesn't show a bunch of warning flags on cells
			if(is_numeric($value)) { $type = 'Number'; }
			elseif(is_string($value)) { $type = 'String'; }
			
			if(!is_null($type)) {
				$this->type($cell, $type);
			}
		}
		
		// Put all our rows in the correct order
		ksort($this->_active_worksheet->cells['row']);
		foreach($this->_active_worksheet->cells['row'] as $k => $v) {
			// Put all of this row's columns in the correct order
			ksort($this->_active_worksheet->cells['row'][$k]['col']);
		}
		return TRUE;
	}
	
	/**
	 * Create a new style that can be applied to cells.
	 * 
	 * @params $style : array - An associative array containing the options of the style.
	 * @author Daniel Razafsky
	 * @return FALSE if $style is not an array. The style's unique id otherwise.
	 *
	 * An example of how to create a currency style follows. This will create a 'NumberFormat' node under the style and set the
	 * 'ss:Format' attribute of the 'NumberFormat' node to the given string.
	 *
	 * $opts = array( 'NumberFormat' => array('ss:Format' => '_("$"* #,##0.00_);_("$"* \(#,##0.00\);_("$"* "-"??_);_(@_)') );
	 * $currency = create_style($opts);
	 */
	function create_style($style) {
		if(!is_array($style)) {
			return FALSE;
		}
		
		$num_styles = count($this->_styles) + 1;
		$style_name = 's' . $num_styles;
		
		$dom_style = create_element($this->_dom, 'Style');
		append_child($dom_style, create_attribute($this->_dom, 'ss:ID', $style_name));
		append_child($dom_style, create_attribute($this->_dom, 'ss:Name', $style_name));
				
		foreach($style as $element => $attrs) {
			$ele = create_element($this->_dom, $element);
			foreach($attrs as $attr => $value) {
				append_child($ele, create_attribute($this->_dom, $attr, $value));
			}
			append_child($dom_style, $ele);
		}
		
		$this->_styles[$style_name] = $dom_style;
		
		return $style_name;
	}
	
	/**
	 * Assign a formula to a cell.
	 * 
	 * @params $cell : string - The string representation of a cell.
	 * @params $formula : string - The string formula using RC cell representation.
	 * @author Daniel Razafsky
	 * @return TRUE if $formula is set. FALSE in all other cases.
	 *
	 */
	function formula($cell, $formula) {
		list($row, $col) = $this->_split_cell($cell);
		$col = $this->alpha_to_number($col);
		
		$this->_active_worksheet->cells['row'][$row]['col'][$col]['formula'] = $formula;
		$this->_active_worksheet->cells['row'][$row]['col'][$col]['data'] = null;
		
		return TRUE;
	}
	
	/**
	 * Convert a numeric column index into an alpha column heading.
	 * 
	 * @params $col : string - The integer column index
	 * @author Daniel Razafsky
	 * @return The alpha column name.
	 */
	function number_to_alpha($col) {
		$temp_col = '';
		$dividend = $col;
		
		while(0 < $dividend) {
			$modulo = ($dividend - 1) % 26;
			$temp_col = chr(65 + $modulo) . $temp_col;
			$dividend = (int)(($dividend - $modulo) / 26);
		}
		
		return $temp_col;
	}
	
	/**
	 * Convert a numeric column index into an alpha column heading.
	 * 
	 * @params $return : string - Indicates how the xml should be output. D forces an xls download. S returns the xml as a string.
	 * @author Daniel Razafsky
	 * @return void/string - No value is returned unless $return is 'S' in which case the xml string representing the worksheet is returned.
	 */
	function output($return = 'D', $nmfile) {
		// Create the workbook object that acts as the root element
		$workbook = create_element($this->_dom, 'Workbook');
		append_child($this->_dom, $workbook);
		append_child($workbook, create_attribute($this->_dom, 'xmlns', 'urn:schemas-microsoft-com:office:spreadsheet'));
		append_child($workbook, create_attribute($this->_dom, 'xmlns:o', 'urn:schemas-microsoft-com:office:office'));
		append_child($workbook, create_attribute($this->_dom, 'xmlns:x', 'urn:schemas-microsoft-com:office:excel'));
		append_child($workbook, create_attribute($this->_dom, 'xmlns:ss', 'urn:schemas-microsoft-com:office:spreadsheet'));
		append_child($workbook, create_attribute($this->_dom, 'xmlns:html', 'http://www.w3.org/TR/REC-html40'));
		
		// Add in the styles section (assuming we have styles)
		if(!empty($this->_styles)) {
			$styles = create_element($this->_dom, 'Styles');
			
			foreach($this->_styles as $style_id => $cur_style) {
				append_child($styles, $cur_style);
			}
			
			append_child($workbook, $styles);
		}
		
		// Loop over all the worksheets adding them to the workbook
		foreach($this->_worksheets as $cur_worksheet) {
			$worksheet = create_element($this->_dom, 'Worksheet');
			append_child($worksheet, create_attribute($this->_dom, 'ss:Name', $cur_worksheet->name));
			$table = create_element($this->_dom, 'Table');
			
			// Loop over all of the current worksheet's rows and append them
			foreach($cur_worksheet->cells['row'] as $row_index => $cur_row) {
				$row = create_element($this->_dom, 'Row');
				append_child($row, create_attribute($this->_dom, 'ss:Index', $row_index));
				
				// Loop over all the columns in the row and append them
				foreach($cur_row['col'] as $col_index => $cur_cell) {
					$cell = create_element($this->_dom, 'Cell');
					append_child($cell, create_attribute($this->_dom, 'ss:Index', $col_index));
					
					if(!empty($cur_cell['style'])) {
						append_child($cell, create_attribute($this->_dom, 'ss:StyleID', $cur_cell['style']));
					}
					
					if(!empty($cur_cell['formula'])) {
						if('=' != substr($cur_cell['formula'], 0, 1)) {
							$cur_cell['formula'] = '=' . $cur_cell['formula'];
						}
						append_child($cell, create_attribute($this->_dom, 'ss:Formula', $cur_cell['formula']));
					}
					
					$data = create_element($this->_dom, 'Data');
					append_child($data, create_text_node($this->_dom, $cur_cell['data']));
					append_child($data, create_attribute($this->_dom, 'ss:Type', !empty($cur_cell['type']) ? $cur_cell['type'] : 'String'));
					
					// We do still want to set an empty data element for the cell though
					append_child($cell, $data);
					append_child($row, $cell);
				}
				append_child($table, $row);
			}
			
			// Add the table to the workshet
			append_child($worksheet, $table);
			
			// Let's not forget to add the worksheet to the workbook
			append_child($workbook, $worksheet);
		}
		
		switch($return) {
			case 'S':
				return save_xml($this->_dom);
				break;
				
			case 'D':
			default:
				$export_file = 'data_'.str_replace("-","_",$nmfile).'.xls';
				ini_set('zlib.output_compression','Off');

				header('Pragma: public');
				header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');                  // Date in the past   
				header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
				header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1
				header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1
				header('Pragma: no-cache');
				header('Expires: 0');
				header('Content-Transfer-Encoding: none');
				header('Content-Type: application/vnd.ms-excel;');                 // This should work for IE & Opera
				header('Content-type: application/x-msexcel');                    // This should work for the rest
				header('Content-Disposition: attachment; filename="'.basename($export_file).'"');
				
				$CI =& get_instance();
				$CI->output->append_output(save_xml($this->_dom));
				break;
		}
	}
	
	/**
	 * Set the current worksheet.
	 * 
	 * @params $name : string - The name of the worksheet to be activated.
	 * @params $index : integer - The numeric index of the worksheet to be activated. Worksheets are reindexed when a worksheet is deleted. This is ignored if $name is passed.
	 * @author Daniel Razafsky
	 * @return If the worksheet exists, returns TRUE, otherwise returns FALSE.
	 */
	function setActiveWorksheet($name = null, $index = null) {
		if(!is_null($name)) {
			if(isset($this->_worksheet_names[$name])) {
				$this->_active_worksheet =& $this->_worksheets[$this->_worksheet_names[$name]];
				return TRUE;
			}
			
			return FALSE;
		}
		
		if(!is_null($index)) {
			if(isset($this->_worksheets[$index])) {
				$this->_active_worksheet =& $this->_worksheets[$index];
				return TRUE;
			}
			
			return FALSE;
		}
		
		return FALSE;
	}
	
	/**
	 * Enables/disables predictive typing for cell values.  If no value is passed, will return the status of predictive typing. This
	 * will not effect cells that had values set before predictive typing was enabled.
	 * 
	 * @params $enabled : boolean - TRUE to turn on predictive typing of cell values.  FALSE to turn off predictive typing of cell values.
	 * @author Daniel Razafsky
	 * @return TRUE if predictive typing is enabled, FALSE otherwise.
	 */
	function smart_typing($enabled = null) {
		if(is_null($enabled)) {
			return $this->_smart_typing;
		}
		
		$this->_smart_typing = (bool) $enabled;
		return $this->_smart_typing;
	}
	
	/**
	 * Apply a previously created style to a cell.
	 * 
	 * @params $cell : string - The alphanumeric cell name.
	 * @params $style : string - The style name to be applied to $cell.
	 * @author Daniel Razafsky
	 * @return TRUE if the style is applied to the cell.  FALSE otherwise.
	 */
	function style($cell, $style) {
		if(!isset($this->_styles[$style])) {
			return FALSE;
		}
		
		list($row, $col) = $this->_split_cell($cell);
		$col = $this->alpha_to_number($col);
		if(!isset($this->_active_worksheet->cells['row'][$row]['col'][$col])) {
			return FALSE;
		}
		
		$this->_active_worksheet->cells['row'][$row]['col'][$col]['style'] = $style;
		return TRUE;
	}
	
	/**
	 * Set the display type of a cell.
	 * 
	 * @params $cell : string - The name of the worksheet to be activated.
	 * @params $type : string - The display type to assign to a cell.
	 * @author Daniel Razafsky
	 * @return If the worksheet exists, returns TRUE, otherwise returns FALSE.
	 */
	function type($cell, $type='String') {
		list($row, $col) = $this->_split_cell($cell);
		$col = $this->alpha_to_number($col);
		
		if(!isset($this->_active_worksheet->cells['row'][$row]['col'][$col])) {
			return FALSE;
		}
		
		$this->_active_worksheet->cells['row'][$row]['col'][$col]['type'] = $type;
		return TRUE;
	}
	
	/**
	 * Create a new worksheet.
	 * 
	 * @params $name : string - The name of the worksheet to be activated.
	 * @params $index : integer - The numeric index of the worksheet to be activated. Worksheets are reindexed when a worksheet is deleted. This is ignored if $name is passed.
	 * @params $active : boolean - Set the newly created worksheet as the active worksheet.
	 * @author Daniel Razafsky
	 * @return If the worksheet already exists with the given name or index returns FALSE, otherwise returns TRUE.
	 */
	function worksheet($name = null, $index = null, $active = FALSE) {
		$num_worksheets = !empty($this->_worksheets) ? count($this->_worksheets) : 1;
		
		if(is_null($index)) { $index = $num_worksheets; }
		if(is_null($name)) 	{ $name = 'Sheet' . $index; }
	
		
		// Already have a worksheet with this name?
		if(isset($this->_worksheet_names[$name])) { return FALSE; }
		
		// Already have a worksheet at this index?
		if(isset($this->_worksheets[$index])) { return FALSE; }
		
		// Make the new worksheet at the index
		$this->_worksheets[$index] = (object) array('name' => $name, 'cells' => array('row' => array()));
			
		// Update the worksheet_names so that we can look up worksheet indexes by sheet name
		$this->_worksheet_names[$name] = $num_worksheets;
		++$num_worksheets;
		
		// Did the user want this to be the active worksheet?
		if($active) { $this->_active_worksheet =& $this->_worksheets[$index]; }

		// If there's only one worksheet make it active even if the user didn't say so
		if(1 == $num_worksheets) { $this->_active_worksheet =& $this->_worksheets[$index]; }
		
		// Resort our worksheet array so that it is in the correct index order in case the user decided to insert sheets out of order
		ksort($this->_worksheets);
		return TRUE;
	}
	
	/**
	 * Split a cell into it's row/column parts.
	 * 
	 * @params $cell : string - The cell to split.
	 * @author Daniel Razafsky
	 * @return Array containing the row and column of the cell.
	 */
	function _split_cell($cell) {
		$row = FALSE;
		$col = FALSE;
		
		if(preg_match("/^[a-zA-Z]{1,}[0-9]{1,}$/", $cell, $matches)) {
			list($col, $trash) = preg_split("/\\d+/", $matches[0], 2); // Get the column
			list($trash, $row) = preg_split("/[a-zA-Z]+/", $matches[0], 2); // Get the row
		}
		
		return array($row, $col);
	}
}
