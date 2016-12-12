<?php
if (file_exists('../../../wp-config.php' ))
{
    include_once('../../../wp-config.php' );
}
else if (file_exists('./wp-config.php'))
{
    include_once('./wp-config.php');
}

class Link {
    public $URL;
    public $Name;
    public $Description;
    public function __construct($name, $description, $price)
    {
        $this->URL = $name;
        $this->Name = $description;
        $this->Description = $price;
    }
    public function insert($table_name)
    {
        global $wpdb;
        $insert = "insert into " . $table_name . "(URL, Name, Description)" .
            "values ( " .
                "'" . $this->URL . "'," .
                "'" . $this->Name . "'," .
                $this->Description .
                ")" .
                ";";
        $wpdb->query($insert);    
    }
    public static function delete($table_name, $id)
    {
        global $wpdb;
        $delete = "delete from " . $table_name . " " .
            "where id=" . $id.
            ";";
        echo $delete;
        $wpdb->query($delete);
    }
    public function update($table_name, $id)
    {
        global $wpdb;
        $update = "update " . $table_name . " " .
            "set " .
                "URL = '" . $this->URL . "', " .
                "Name = '" . $this->Name . "', " .
                "Description = '" . $this->Description . "'" . 
            "where id = " . $id.
            ";";
        echo $update;
        $wpdb->query($update);
    }
    public static function get_all_products($table_name)
    {
        global $wpdb;
        $select = "select * from " . $table_name . ";";
        $all_products = $wpdb->get_results($select);
        return $all_products;
    }
}