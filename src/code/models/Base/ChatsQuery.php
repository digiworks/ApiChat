<?php

namespace code\models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use code\models\Chats as ChildChats;
use code\models\ChatsQuery as ChildChatsQuery;
use code\models\Map\ChatsTableMap;

/**
 * Base class that represents a query for the 'public.chats' table.
 *
 *
 *
 * @method     ChildChatsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildChatsQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     ChildChatsQuery orderByUseridConect($order = Criteria::ASC) Order by the userid_conect column
 * @method     ChildChatsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildChatsQuery orderByLastMessageAt($order = Criteria::ASC) Order by the last_message_at column
 * @method     ChildChatsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildChatsQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildChatsQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     ChildChatsQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ChildChatsQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method     ChildChatsQuery orderByDeletedBy($order = Criteria::ASC) Order by the deleted_by column
 *
 * @method     ChildChatsQuery groupById() Group by the id column
 * @method     ChildChatsQuery groupByUserid() Group by the userid column
 * @method     ChildChatsQuery groupByUseridConect() Group by the userid_conect column
 * @method     ChildChatsQuery groupByStatus() Group by the status column
 * @method     ChildChatsQuery groupByLastMessageAt() Group by the last_message_at column
 * @method     ChildChatsQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildChatsQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildChatsQuery groupByDeletedAt() Group by the deleted_at column
 * @method     ChildChatsQuery groupByCreatedBy() Group by the created_by column
 * @method     ChildChatsQuery groupByUpdatedBy() Group by the updated_by column
 * @method     ChildChatsQuery groupByDeletedBy() Group by the deleted_by column
 *
 * @method     ChildChatsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChatsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChatsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChatsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChatsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChatsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChats|null findOne(ConnectionInterface $con = null) Return the first ChildChats matching the query
 * @method     ChildChats findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChats matching the query, or a new ChildChats object populated from the query conditions when no match is found
 *
 * @method     ChildChats|null findOneById(int $id) Return the first ChildChats filtered by the id column
 * @method     ChildChats|null findOneByUserid(int $userid) Return the first ChildChats filtered by the userid column
 * @method     ChildChats|null findOneByUseridConect(int $userid_conect) Return the first ChildChats filtered by the userid_conect column
 * @method     ChildChats|null findOneByStatus(int $status) Return the first ChildChats filtered by the status column
 * @method     ChildChats|null findOneByLastMessageAt(string $last_message_at) Return the first ChildChats filtered by the last_message_at column
 * @method     ChildChats|null findOneByCreatedAt(string $created_at) Return the first ChildChats filtered by the created_at column
 * @method     ChildChats|null findOneByUpdatedAt(string $updated_at) Return the first ChildChats filtered by the updated_at column
 * @method     ChildChats|null findOneByDeletedAt(string $deleted_at) Return the first ChildChats filtered by the deleted_at column
 * @method     ChildChats|null findOneByCreatedBy(int $created_by) Return the first ChildChats filtered by the created_by column
 * @method     ChildChats|null findOneByUpdatedBy(int $updated_by) Return the first ChildChats filtered by the updated_by column
 * @method     ChildChats|null findOneByDeletedBy(int $deleted_by) Return the first ChildChats filtered by the deleted_by column *

 * @method     ChildChats requirePk($key, ConnectionInterface $con = null) Return the ChildChats by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOne(ConnectionInterface $con = null) Return the first ChildChats matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChats requireOneById(int $id) Return the first ChildChats filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByUserid(int $userid) Return the first ChildChats filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByUseridConect(int $userid_conect) Return the first ChildChats filtered by the userid_conect column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByStatus(int $status) Return the first ChildChats filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByLastMessageAt(string $last_message_at) Return the first ChildChats filtered by the last_message_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByCreatedAt(string $created_at) Return the first ChildChats filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByUpdatedAt(string $updated_at) Return the first ChildChats filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByDeletedAt(string $deleted_at) Return the first ChildChats filtered by the deleted_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByCreatedBy(int $created_by) Return the first ChildChats filtered by the created_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByUpdatedBy(int $updated_by) Return the first ChildChats filtered by the updated_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChats requireOneByDeletedBy(int $deleted_by) Return the first ChildChats filtered by the deleted_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChats[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChats objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildChats> find(ConnectionInterface $con = null) Return ChildChats objects based on current ModelCriteria
 * @method     ChildChats[]|ObjectCollection findById(int $id) Return ChildChats objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findById(int $id) Return ChildChats objects filtered by the id column
 * @method     ChildChats[]|ObjectCollection findByUserid(int $userid) Return ChildChats objects filtered by the userid column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByUserid(int $userid) Return ChildChats objects filtered by the userid column
 * @method     ChildChats[]|ObjectCollection findByUseridConect(int $userid_conect) Return ChildChats objects filtered by the userid_conect column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByUseridConect(int $userid_conect) Return ChildChats objects filtered by the userid_conect column
 * @method     ChildChats[]|ObjectCollection findByStatus(int $status) Return ChildChats objects filtered by the status column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByStatus(int $status) Return ChildChats objects filtered by the status column
 * @method     ChildChats[]|ObjectCollection findByLastMessageAt(string $last_message_at) Return ChildChats objects filtered by the last_message_at column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByLastMessageAt(string $last_message_at) Return ChildChats objects filtered by the last_message_at column
 * @method     ChildChats[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildChats objects filtered by the created_at column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByCreatedAt(string $created_at) Return ChildChats objects filtered by the created_at column
 * @method     ChildChats[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildChats objects filtered by the updated_at column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByUpdatedAt(string $updated_at) Return ChildChats objects filtered by the updated_at column
 * @method     ChildChats[]|ObjectCollection findByDeletedAt(string $deleted_at) Return ChildChats objects filtered by the deleted_at column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByDeletedAt(string $deleted_at) Return ChildChats objects filtered by the deleted_at column
 * @method     ChildChats[]|ObjectCollection findByCreatedBy(int $created_by) Return ChildChats objects filtered by the created_by column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByCreatedBy(int $created_by) Return ChildChats objects filtered by the created_by column
 * @method     ChildChats[]|ObjectCollection findByUpdatedBy(int $updated_by) Return ChildChats objects filtered by the updated_by column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByUpdatedBy(int $updated_by) Return ChildChats objects filtered by the updated_by column
 * @method     ChildChats[]|ObjectCollection findByDeletedBy(int $deleted_by) Return ChildChats objects filtered by the deleted_by column
 * @psalm-method ObjectCollection&\Traversable<ChildChats> findByDeletedBy(int $deleted_by) Return ChildChats objects filtered by the deleted_by column
 * @method     ChildChats[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildChats> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChatsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \code\models\Base\ChatsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\code\\models\\Chats', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChatsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChatsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChatsQuery) {
            return $criteria;
        }
        $query = new ChildChatsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildChats|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChatsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ChatsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildChats A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, userid, userid_conect, status, last_message_at, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by FROM public.chats WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildChats $obj */
            $obj = new ChildChats();
            $obj->hydrate($row);
            ChatsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildChats|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE userid = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE userid IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE userid > 12
     * </code>
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_USERID, $userid, $comparison);
    }

    /**
     * Filter the query on the userid_conect column
     *
     * Example usage:
     * <code>
     * $query->filterByUseridConect(1234); // WHERE userid_conect = 1234
     * $query->filterByUseridConect(array(12, 34)); // WHERE userid_conect IN (12, 34)
     * $query->filterByUseridConect(array('min' => 12)); // WHERE userid_conect > 12
     * </code>
     *
     * @param     mixed $useridConect The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByUseridConect($useridConect = null, $comparison = null)
    {
        if (is_array($useridConect)) {
            $useMinMax = false;
            if (isset($useridConect['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_USERID_CONECT, $useridConect['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($useridConect['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_USERID_CONECT, $useridConect['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_USERID_CONECT, $useridConect, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the last_message_at column
     *
     * Example usage:
     * <code>
     * $query->filterByLastMessageAt('2011-03-14'); // WHERE last_message_at = '2011-03-14'
     * $query->filterByLastMessageAt('now'); // WHERE last_message_at = '2011-03-14'
     * $query->filterByLastMessageAt(array('max' => 'yesterday')); // WHERE last_message_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastMessageAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByLastMessageAt($lastMessageAt = null, $comparison = null)
    {
        if (is_array($lastMessageAt)) {
            $useMinMax = false;
            if (isset($lastMessageAt['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_LAST_MESSAGE_AT, $lastMessageAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastMessageAt['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_LAST_MESSAGE_AT, $lastMessageAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_LAST_MESSAGE_AT, $lastMessageAt, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the deleted_at column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $deletedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_DELETED_AT, $deletedAt, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
     * </code>
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
     * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
     * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by > 12
     * </code>
     *
     * @param     mixed $updatedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query on the deleted_by column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedBy(1234); // WHERE deleted_by = 1234
     * $query->filterByDeletedBy(array(12, 34)); // WHERE deleted_by IN (12, 34)
     * $query->filterByDeletedBy(array('min' => 12)); // WHERE deleted_by > 12
     * </code>
     *
     * @param     mixed $deletedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function filterByDeletedBy($deletedBy = null, $comparison = null)
    {
        if (is_array($deletedBy)) {
            $useMinMax = false;
            if (isset($deletedBy['min'])) {
                $this->addUsingAlias(ChatsTableMap::COL_DELETED_BY, $deletedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedBy['max'])) {
                $this->addUsingAlias(ChatsTableMap::COL_DELETED_BY, $deletedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatsTableMap::COL_DELETED_BY, $deletedBy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChats $chats Object to remove from the list of results
     *
     * @return $this|ChildChatsQuery The current query, for fluid interface
     */
    public function prune($chats = null)
    {
        if ($chats) {
            $this->addUsingAlias(ChatsTableMap::COL_ID, $chats->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the public.chats table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChatsTableMap::clearInstancePool();
            ChatsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChatsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChatsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChatsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChatsQuery
