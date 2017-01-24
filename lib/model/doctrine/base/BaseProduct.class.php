<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Product', 'doctrine');

/**
 * BaseProduct
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $intro
 * @property string $descr
 * @property decimal $price
 * @property string $photo
 * @property integer $is_active
 * @property integer $created_user_id
 * @property timestamp $created_at
 * @property Category $Category
 * 
 * @method integer   getId()              Returns the current record's "id" value
 * @method integer   getCategoryId()      Returns the current record's "category_id" value
 * @method string    getName()            Returns the current record's "name" value
 * @method string    getIntro()           Returns the current record's "intro" value
 * @method string    getDescr()           Returns the current record's "descr" value
 * @method decimal   getPrice()           Returns the current record's "price" value
 * @method string    getPhoto()           Returns the current record's "photo" value
 * @method integer   getIsActive()        Returns the current record's "is_active" value
 * @method integer   getCreatedUserId()   Returns the current record's "created_user_id" value
 * @method timestamp getCreatedAt()       Returns the current record's "created_at" value
 * @method Category  getCategory()        Returns the current record's "Category" value
 * @method Product   setId()              Sets the current record's "id" value
 * @method Product   setCategoryId()      Sets the current record's "category_id" value
 * @method Product   setName()            Sets the current record's "name" value
 * @method Product   setIntro()           Sets the current record's "intro" value
 * @method Product   setDescr()           Sets the current record's "descr" value
 * @method Product   setPrice()           Sets the current record's "price" value
 * @method Product   setPhoto()           Sets the current record's "photo" value
 * @method Product   setIsActive()        Sets the current record's "is_active" value
 * @method Product   setCreatedUserId()   Sets the current record's "created_user_id" value
 * @method Product   setCreatedAt()       Sets the current record's "created_at" value
 * @method Product   setCategory()        Sets the current record's "Category" value
 * 
 * @package    megamed
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProduct extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('category_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 150, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 150,
             ));
        $this->hasColumn('intro', 'string', 455, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 455,
             ));
        $this->hasColumn('descr', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('price', 'decimal', 10, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
        $this->hasColumn('photo', 'string', 150, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 150,
             ));
        $this->hasColumn('is_active', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('created_user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));
    }
}