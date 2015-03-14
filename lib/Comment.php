<?php 
class Comment
{
    
    protected $id;
    protected $name;
    protected $time;
    protected $text;
       
    public function setFields($data)
    {
        foreach ($data as $key => $value) {
            $data[$key]=trim($value);
        }
        
        $this->name = $data['name'];
        $this->text = $data['text'];
    }

    public function checkFields()
    {
        $regExp     = "/^.+$/ui";
        
        if (!preg_match($regExp, $this->name))
            return "name";
        
        if (!preg_match($regExp, $this->text))
            return "text";
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }
  
    public function getName()
    {
        return $this->name;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getText()
    {
        return $this->text;
    }
        
}