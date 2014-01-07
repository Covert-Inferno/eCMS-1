<?php
/**
 * Created by PhpStorm.
 * User: Dominic
 * Date: 06.01.14
 * Time: 16:47
 */

namespace eCMS\EveAPI;


class EveAPI {

    private $keyID;
    private $vCode;
    protected $apiLink = 'https://api.eveonline.com';
    protected $imgLink;

    public function __construct($keyID, $vCode) {
        $this->setKeyID($keyID);
        $this->setVCode($vCode);
    }

    private function prepareDataArray($data = NULL) {
        $dataArray = array(
            'keyID' => urlencode($this->getKeyID()),
            'vCode' => urlencode($this->getVCode())
        );

        if ($data != NULL) {
            foreach ($data as $key => $val) {
                $dataArray[$key] = urlencode($val);
            }
        }
        return $dataArray;
    }

    public function fetchData($uri, $data = NULL) {
        if($data == NULL) {
            $this->prepareDataArray();
            $xml = gatherXML::getXML($this->getApiLink() . $uri);
        } else {
            $dataArray = $this->prepareDataArray($data);
            $xml = gatherXML::getXML($this->getApiLink() . $uri, $dataArray);
        }
        return new \SimpleXMLElement($xml);
    }

    public function getCallList() {
        $xml = gatherXML::getXML($this->getApiLink() . '/api/calllist.xml.aspx');
        return new \SimpleXMLElement($xml);
    }

    /**
     * @param mixed $keyID
     */
    public function setKeyID($keyID)
    {
        $this->keyID = $keyID;
    }

    /**
     * @return mixed
     */
    public function getKeyID()
    {
        return $this->keyID;
    }

    /**
     * @param mixed $vCode
     */
    public function setVCode($vCode)
    {
        $this->vCode = $vCode;
    }

    /**
     * @return mixed
     */
    public function getVCode()
    {
        return $this->vCode;
    }

    /**
     * @return string
     */
    public function getApiLink()
    {
        return $this->apiLink;
    }


}