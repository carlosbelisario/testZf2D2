<?php 

namespace Album\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class AlbumTable extends AbstractTableGateway
{
    /**
    *
    * @var String $table
    */
    protected $table = 'album';

    /**
    *
    * @param Adapter $adapter    
    */
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
        $this->resulsetPrototype = new ResultSet();
        $this->resulsetPrototype->setArrayObjectPrototype(new Album());        
    }

    /**
    *
    * @method fetchAll 
    * @return ResultSet
    */
    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    /**
    *
    * @method getAlbum
    * @param int $id
    * @return Album
    * @throws Exception if not exist row with the id
    */
    public function getAlbum($id) 
    {
        $id = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if(!$row) {
            throw new \Exception('Could not find row' . $id);
        }
        return $row;
    }

    /**
    *
    * @method saveAlbum
    * @param Album $album
    * @return boolean
    */
    public function saveAlbum(Album $album)
    {
        $data = array(
            'artist' => $album->artist,
            'title'  => $album->title,
        );
        $id = (int)$album->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getAlbum($id)) {
               $this->update($data, array('id' => $id));
            } else {
               throw new \Exception('Form id does not exist');
               return false;
            }        
       }
       return true;
    }

    /**
    *
    * @method deleteAlbum
    * @param int $id
    */    
    public function deleteAlbum($id)
    {
        $this->delete(array('id' => $id));
    }
}
