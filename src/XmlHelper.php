<?php
namespace GdzieBusik\MyBusAPI;

use Psr\Http\Message\ResponseInterface;

class XmlHelper
{
    public function load(ResponseInterface $response): \SimpleXMLElement|null {
        $content = $response->getBody()->getContents();
        $xml = simplexml_load_string($content);
        if (!$xml) return null;
        return $xml;
    }

    public function intOrDefault($val, $default = 0) {
        $val = trim($val);
        return is_numeric($val) ? (int)$val : $default;
    }
}