<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 12/10/15
 * Time: 2:25 PM
 */

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;
use \Zend\Debug\Debug as dump;

class FormulaireTable
{
    protected $tableGateway;

    public function __construct(AlbumTableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getFormulaire($id)
    {
//        dump::dump($this->tableGateway->getServiceLocator()->get('config'));
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveFormulaire(Formulaire $formulaire)
    {
     \Zend\Debug\Debug::dump($formulaire);
        $data = array(
            'FirstName' => $formulaire->FirstName,
            'LastName'  => $formulaire->LastName,
            'PhoneNumber' => $formulaire->PhoneNumber,
            'City' => $formulaire->City,
            'Street' => $formulaire->Street,
            'NumberStreet' => $formulaire->NumberStreet,
        );

        $id = (int) $formulaire->Id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Album id does not exist');
            }
        }
    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}