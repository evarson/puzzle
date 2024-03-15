<?php

class PuzzleData
{

    public function getFirstName()
    {
        return "Evar";
    }

    public function getLastName()
    {
        return "Saar";
    }

    public function getEmail()
    {
        return "evar.saar@gmail.com";
    }

    public function getBio()
    {
        return "My name is Evar Saar and i have three years of experience as PHP developer and one year and nine months\n
                experience as a ruby developer. I have experience with HTML, MySQL, Zend2, Laminas, Bootstrap. And i\n
                have experience with Docker.\r\n
                I believe I would be a great fit for the position of PHP developer because of my strong technical skills,\n
                practical experience, and passion for creating innovative web solutions. I am dedicated to delivering\n
                high-quality code, meeting project deadlines, and collaborating effectively with cross-functional teams.\n
                Thank you for considering my application. I am excited about the opportunity to contribute to your team\n
                and help drive success through my experience in PHP development.";
    }

    public function getTechnologies()
    {
        return ["PHP", "HTML", "MySQL", "Zend2", "Laminas", "Bootstrap", "Docker"];
    }

    public function getTimestamp()
    {
        return time();
    }

    public function getSignature()
    {
        return sha1($this->getTimestamp()."credy");
    }

    public function getVcsUri()
    {
        return "https://github.com/sadafe";
    }

    public function getContent()
    {
        return [
            'fist_name'    => $this->getFirstName(),
            'last_name'    => $this->getLastName(),
            'email'        => $this->getEmail(),
            'bio'          => $this->getBio(),
            'technologies' => $this->getTechnologies(),
            'timestamp'    => $this->getTimestamp(),
            'signature'    => $this->getSignature(),
            'vcs_uri'      => $this->getVcsUri()
        ];
    }

    public function array_to_jsonx($array) {
        $json = "";
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $json .= "<json:object name=" . $key . ">" . $this->array_to_jsonx($value) . "</json:object>";
            } else {
                $json .= "<json:string name=" . $key . ">" . htmlspecialchars($value) . "</json:string>";
            }
        }
        return $json;
    }

    public function toJSONx()
    {
        $jsonx = "<json:object xmlns:json=http://www.ibm.com/xmlns/prod/2009/jsonx>" . $this->array_to_jsonx($this->getContent()) . "</json:object>";
        return $jsonx;
    }
}