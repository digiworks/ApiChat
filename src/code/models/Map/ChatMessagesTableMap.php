<?php

namespace code\models\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use code\models\ChatMessages;
use code\models\ChatMessagesQuery;


/**
 * This class defines the structure of the 'public.chat_messages' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ChatMessagesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'code.models.Map.ChatMessagesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'public.chat_messages';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\code\\models\\ChatMessages';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'code.models.ChatMessages';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the message_id field
     */
    const COL_MESSAGE_ID = 'public.chat_messages.message_id';

    /**
     * the column name for the chat_id field
     */
    const COL_CHAT_ID = 'public.chat_messages.chat_id';

    /**
     * the column name for the message field
     */
    const COL_MESSAGE = 'public.chat_messages.message';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'public.chat_messages.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'public.chat_messages.updated_at';

    /**
     * the column name for the deleted_at field
     */
    const COL_DELETED_AT = 'public.chat_messages.deleted_at';

    /**
     * the column name for the created_by field
     */
    const COL_CREATED_BY = 'public.chat_messages.created_by';

    /**
     * the column name for the updated_by field
     */
    const COL_UPDATED_BY = 'public.chat_messages.updated_by';

    /**
     * the column name for the deleted_by field
     */
    const COL_DELETED_BY = 'public.chat_messages.deleted_by';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('MessageId', 'ChatId', 'Message', 'CreatedAt', 'UpdatedAt', 'DeletedAt', 'CreatedBy', 'UpdatedBy', 'DeletedBy', ),
        self::TYPE_CAMELNAME     => array('messageId', 'chatId', 'message', 'createdAt', 'updatedAt', 'deletedAt', 'createdBy', 'updatedBy', 'deletedBy', ),
        self::TYPE_COLNAME       => array(ChatMessagesTableMap::COL_MESSAGE_ID, ChatMessagesTableMap::COL_CHAT_ID, ChatMessagesTableMap::COL_MESSAGE, ChatMessagesTableMap::COL_CREATED_AT, ChatMessagesTableMap::COL_UPDATED_AT, ChatMessagesTableMap::COL_DELETED_AT, ChatMessagesTableMap::COL_CREATED_BY, ChatMessagesTableMap::COL_UPDATED_BY, ChatMessagesTableMap::COL_DELETED_BY, ),
        self::TYPE_FIELDNAME     => array('message_id', 'chat_id', 'message', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('MessageId' => 0, 'ChatId' => 1, 'Message' => 2, 'CreatedAt' => 3, 'UpdatedAt' => 4, 'DeletedAt' => 5, 'CreatedBy' => 6, 'UpdatedBy' => 7, 'DeletedBy' => 8, ),
        self::TYPE_CAMELNAME     => array('messageId' => 0, 'chatId' => 1, 'message' => 2, 'createdAt' => 3, 'updatedAt' => 4, 'deletedAt' => 5, 'createdBy' => 6, 'updatedBy' => 7, 'deletedBy' => 8, ),
        self::TYPE_COLNAME       => array(ChatMessagesTableMap::COL_MESSAGE_ID => 0, ChatMessagesTableMap::COL_CHAT_ID => 1, ChatMessagesTableMap::COL_MESSAGE => 2, ChatMessagesTableMap::COL_CREATED_AT => 3, ChatMessagesTableMap::COL_UPDATED_AT => 4, ChatMessagesTableMap::COL_DELETED_AT => 5, ChatMessagesTableMap::COL_CREATED_BY => 6, ChatMessagesTableMap::COL_UPDATED_BY => 7, ChatMessagesTableMap::COL_DELETED_BY => 8, ),
        self::TYPE_FIELDNAME     => array('message_id' => 0, 'chat_id' => 1, 'message' => 2, 'created_at' => 3, 'updated_at' => 4, 'deleted_at' => 5, 'created_by' => 6, 'updated_by' => 7, 'deleted_by' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'MessageId' => 'MESSAGE_ID',
        'ChatMessages.MessageId' => 'MESSAGE_ID',
        'messageId' => 'MESSAGE_ID',
        'chatMessages.messageId' => 'MESSAGE_ID',
        'ChatMessagesTableMap::COL_MESSAGE_ID' => 'MESSAGE_ID',
        'COL_MESSAGE_ID' => 'MESSAGE_ID',
        'message_id' => 'MESSAGE_ID',
        'public.chat_messages.message_id' => 'MESSAGE_ID',
        'ChatId' => 'CHAT_ID',
        'ChatMessages.ChatId' => 'CHAT_ID',
        'chatId' => 'CHAT_ID',
        'chatMessages.chatId' => 'CHAT_ID',
        'ChatMessagesTableMap::COL_CHAT_ID' => 'CHAT_ID',
        'COL_CHAT_ID' => 'CHAT_ID',
        'chat_id' => 'CHAT_ID',
        'public.chat_messages.chat_id' => 'CHAT_ID',
        'Message' => 'MESSAGE',
        'ChatMessages.Message' => 'MESSAGE',
        'message' => 'MESSAGE',
        'chatMessages.message' => 'MESSAGE',
        'ChatMessagesTableMap::COL_MESSAGE' => 'MESSAGE',
        'COL_MESSAGE' => 'MESSAGE',
        'public.chat_messages.message' => 'MESSAGE',
        'CreatedAt' => 'CREATED_AT',
        'ChatMessages.CreatedAt' => 'CREATED_AT',
        'createdAt' => 'CREATED_AT',
        'chatMessages.createdAt' => 'CREATED_AT',
        'ChatMessagesTableMap::COL_CREATED_AT' => 'CREATED_AT',
        'COL_CREATED_AT' => 'CREATED_AT',
        'created_at' => 'CREATED_AT',
        'public.chat_messages.created_at' => 'CREATED_AT',
        'UpdatedAt' => 'UPDATED_AT',
        'ChatMessages.UpdatedAt' => 'UPDATED_AT',
        'updatedAt' => 'UPDATED_AT',
        'chatMessages.updatedAt' => 'UPDATED_AT',
        'ChatMessagesTableMap::COL_UPDATED_AT' => 'UPDATED_AT',
        'COL_UPDATED_AT' => 'UPDATED_AT',
        'updated_at' => 'UPDATED_AT',
        'public.chat_messages.updated_at' => 'UPDATED_AT',
        'DeletedAt' => 'DELETED_AT',
        'ChatMessages.DeletedAt' => 'DELETED_AT',
        'deletedAt' => 'DELETED_AT',
        'chatMessages.deletedAt' => 'DELETED_AT',
        'ChatMessagesTableMap::COL_DELETED_AT' => 'DELETED_AT',
        'COL_DELETED_AT' => 'DELETED_AT',
        'deleted_at' => 'DELETED_AT',
        'public.chat_messages.deleted_at' => 'DELETED_AT',
        'CreatedBy' => 'CREATED_BY',
        'ChatMessages.CreatedBy' => 'CREATED_BY',
        'createdBy' => 'CREATED_BY',
        'chatMessages.createdBy' => 'CREATED_BY',
        'ChatMessagesTableMap::COL_CREATED_BY' => 'CREATED_BY',
        'COL_CREATED_BY' => 'CREATED_BY',
        'created_by' => 'CREATED_BY',
        'public.chat_messages.created_by' => 'CREATED_BY',
        'UpdatedBy' => 'UPDATED_BY',
        'ChatMessages.UpdatedBy' => 'UPDATED_BY',
        'updatedBy' => 'UPDATED_BY',
        'chatMessages.updatedBy' => 'UPDATED_BY',
        'ChatMessagesTableMap::COL_UPDATED_BY' => 'UPDATED_BY',
        'COL_UPDATED_BY' => 'UPDATED_BY',
        'updated_by' => 'UPDATED_BY',
        'public.chat_messages.updated_by' => 'UPDATED_BY',
        'DeletedBy' => 'DELETED_BY',
        'ChatMessages.DeletedBy' => 'DELETED_BY',
        'deletedBy' => 'DELETED_BY',
        'chatMessages.deletedBy' => 'DELETED_BY',
        'ChatMessagesTableMap::COL_DELETED_BY' => 'DELETED_BY',
        'COL_DELETED_BY' => 'DELETED_BY',
        'deleted_by' => 'DELETED_BY',
        'public.chat_messages.deleted_by' => 'DELETED_BY',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('public.chat_messages');
        $this->setPhpName('ChatMessages');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\code\\models\\ChatMessages');
        $this->setPackage('code.models');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('public.chat_messages_message_id_seq');
        // columns
        $this->addPrimaryKey('message_id', 'MessageId', 'INTEGER', true, null, null);
        $this->addColumn('chat_id', 'ChatId', 'INTEGER', true, null, null);
        $this->addColumn('message', 'Message', 'CLOB', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('deleted_at', 'DeletedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('created_by', 'CreatedBy', 'INTEGER', false, null, null);
        $this->addColumn('updated_by', 'UpdatedBy', 'INTEGER', false, null, null);
        $this->addColumn('deleted_by', 'DeletedBy', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MessageId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MessageId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MessageId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MessageId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MessageId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MessageId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('MessageId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ChatMessagesTableMap::CLASS_DEFAULT : ChatMessagesTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (ChatMessages object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ChatMessagesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ChatMessagesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ChatMessagesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ChatMessagesTableMap::OM_CLASS;
            /** @var ChatMessages $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ChatMessagesTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ChatMessagesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ChatMessagesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ChatMessages $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ChatMessagesTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_MESSAGE_ID);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_CHAT_ID);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_MESSAGE);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_DELETED_AT);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_CREATED_BY);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_UPDATED_BY);
            $criteria->addSelectColumn(ChatMessagesTableMap::COL_DELETED_BY);
        } else {
            $criteria->addSelectColumn($alias . '.message_id');
            $criteria->addSelectColumn($alias . '.chat_id');
            $criteria->addSelectColumn($alias . '.message');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.deleted_at');
            $criteria->addSelectColumn($alias . '.created_by');
            $criteria->addSelectColumn($alias . '.updated_by');
            $criteria->addSelectColumn($alias . '.deleted_by');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_MESSAGE_ID);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_CHAT_ID);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_MESSAGE);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_CREATED_AT);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_UPDATED_AT);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_DELETED_AT);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_CREATED_BY);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_UPDATED_BY);
            $criteria->removeSelectColumn(ChatMessagesTableMap::COL_DELETED_BY);
        } else {
            $criteria->removeSelectColumn($alias . '.message_id');
            $criteria->removeSelectColumn($alias . '.chat_id');
            $criteria->removeSelectColumn($alias . '.message');
            $criteria->removeSelectColumn($alias . '.created_at');
            $criteria->removeSelectColumn($alias . '.updated_at');
            $criteria->removeSelectColumn($alias . '.deleted_at');
            $criteria->removeSelectColumn($alias . '.created_by');
            $criteria->removeSelectColumn($alias . '.updated_by');
            $criteria->removeSelectColumn($alias . '.deleted_by');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ChatMessagesTableMap::DATABASE_NAME)->getTable(ChatMessagesTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a ChatMessages or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChatMessages object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatMessagesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \code\models\ChatMessages) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ChatMessagesTableMap::DATABASE_NAME);
            $criteria->add(ChatMessagesTableMap::COL_MESSAGE_ID, (array) $values, Criteria::IN);
        }

        $query = ChatMessagesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ChatMessagesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ChatMessagesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the public.chat_messages table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ChatMessagesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ChatMessages or Criteria object.
     *
     * @param mixed               $criteria Criteria or ChatMessages object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatMessagesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ChatMessages object
        }

        if ($criteria->containsKey(ChatMessagesTableMap::COL_MESSAGE_ID) && $criteria->keyContainsValue(ChatMessagesTableMap::COL_MESSAGE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ChatMessagesTableMap::COL_MESSAGE_ID.')');
        }


        // Set the correct dbName
        $query = ChatMessagesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ChatMessagesTableMap
