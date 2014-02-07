<?PHP
if(!function_exists('append_child')) {
	function append_child($parent, $child) {
		if(4 == PHP_MAJOR_VERSION) {
			return $parent->append_child($child);
		}
		
		return $parent->appendChild($child);
	}
}

if(!function_exists('create_attribute')) {
	function create_attribute($dom, $attribute_name, $value) {
		if(4 == PHP_MAJOR_VERSION) {
			return $dom->create_attribute($attribute_name, $value);
		}
		
		$attr = $dom->createAttribute($attribute_name);
		append_child($attr, create_text_node($dom, $value));
		return $attr;
	}
}

if(!function_exists('create_element')) {
	function create_element($dom, $element_name) {
		if(4 == PHP_MAJOR_VERSION) {
			return $dom->create_element($element_name);
		}
		
		return $dom->createElement($element_name);
	}
}

if(!function_exists('create_text_node')) {
	function create_text_node($dom, $content) {
		if(4 == PHP_MAJOR_VERSION) {
			return $dom->create_text_node($content);
		}
		
		return $dom->createTextNode($content);
	}
}

if(!function_exists('new_xml_dom')) {
	function new_xml_dom() {
		return 4 == PHP_MAJOR_VERSION ? domxml_new_doc('1.0') : new DOMDocument('1.0');
	}
}

if(!function_exists('save_xml')) {
	function save_xml($dom) {
		if(4 == PHP_MAJOR_VERSION) {
			return $dom->dump_mem(true);
		}
		
		$dom->formatOutput = true;
		return $dom->saveXML();
	}
}