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
use code\models\ChatMessages as ChildChatMessages;
use code\models\ChatMessagesQuery as ChildChatMessagesQuery;
use code\models\Map\ChatMessagesTableMap;

/**
 * Base class that represents a query for the 'public.chat_messages' table.
 *
 *
 *
 * @method     ChildChatMessagesQuery orderByMessageId($order = Criteria::ASC) Order by the message_id column
 * @method     ChildChatMessagesQuery orderByChatId($order = Criteria::ASC) Order by the chat_id column
 * @method     ChildChatMessagesQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildChatMessagesQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildChatMessagesQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildChatMessagesQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     ChildChatMessagesQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ChildChatMessagesQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method     ChildChatMessagesQuery orderByDeletedBy($order = Criteria::ASC) Order by the deleted_by column
 *
 * @method     ChildChatMessagesQuery groupByMessageId() Group by the message_id column
 * @method     ChildChatMessagesQuery groupByChatId() Group by the chat_id column
 * @method     ChildChatMessagesQuery groupByMessage() Group by the message column
 * @method     ChildChatMessagesQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildChatMessagesQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildChatMessagesQuery groupByDeletedAt() Group by the deleted_at column
 * @method     ChildChatMessagesQuery groupByCreatedBy() Group by the created_by column
 * @method     ChildChatMessagesQuery groupByUpdatedBy() Group by the updated_by column
 * @method     ChildChatMessagesQuery groupByDeletedBy() Group by the deleted_by column
 *
 * @method     ChildChatMessagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChatMessagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChatMessagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChatMessagesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChatMessagesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChatMessagesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChatMessages|null findOne(ConnectionInterface $con = null) Return the first ChildChatMessages matching the query
 * @method     ChildChatMessages findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChatMessages matching the query, or a new ChildChatMessages object populated from the query conditions when no match is found
 *
 * @method     ChildChatMessages|null findOneByMessageId(int $message_id) Return the first ChildChatMessages filtered by the message_id column
 * @method     ChildChatMessages|null findOneByChatId(int $chat_id) Return the first ChildChatMessages filtered by the chat_id column
 * @method     ChildChatMessages|null findOneByMessage(string $message) Return the first ChildChatMessages filtered by the message column
 * @method     ChildChatMessages|null findOneByCreatedAt(string $created_at) Return the first ChildChatMessages filtered by the created_at column
 * @method     ChildChatMessages|null findOneByUpdatedAt(string $updated_at) Return the first ChildChatMessages filtered by the updated_at column
 * @method     ChildChatMessages|null findOneByDeletedAt(string $deleted_at) Return the first ChildChatMessages filtered by the deleted_at column
 * @method     ChildChatMessages|null findOneByCreatedBy(int $created_by) Return the first ChildChatMessages filtered by the created_by column
 * @method     ChildChatMessages|null findOneByUpdatedBy(int $updated_by) Return the first ChildChatMessages filtered by the updated_by column
 * @method     ChildChatMessages|null findOneByDeletedBy(int $deleted_by) Return the first ChildChatMessages filtered by the deleted_by column *

 * @method     ChildChatMessages requirePk($key, ConnectionInterface $con = null) Return the ChildChatMessages by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOne(ConnectionInterface $con = null) Return the first ChildChatMessages matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChatMessages requireOneByMessageId(int $message_id) Return the first ChildChatMessages filtered by the message_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByChatId(int $chat_id) Return the first ChildChatMessages filtered by the chat_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByMessage(string $message) Return the first ChildChatMessages filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByCreatedAt(string $created_at) Return the first ChildChatMessages filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByUpdatedAt(string $updated_at) Return the first ChildChatMessages filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByDeletedAt(string $deleted_at) Return the first ChildChatMessages filtered by the deleted_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByCreatedBy(int $created_by) Return the first ChildChatMessages filtered by the created_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByUpdatedBy(int $updated_by) Return the first ChildChatMessages filtered by the updated_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChatMessages requireOneByDeletedBy(int $deleted_by) Return the first ChildChatMessages filtered by the deleted_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChatMessages[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChatMessages objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> find(ConnectionInterface $con = null) Return ChildChatMessages objects based on current ModelCriteria
 * @method     ChildChatMessages[]|ObjectCollection findByMessageId(int $message_id) Return ChildChatMessages objects filtered by the message_id column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByMessageId(int $message_id) Return ChildChatMessages objects filtered by the message_id column
 * @method     ChildChatMessages[]|ObjectCollection findByChatId(int $chat_id) Return ChildChatMessages objects filtered by the chat_id column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByChatId(int $chat_id) Return ChildChatMessages objects filtered by the chat_id column
 * @method     ChildChatMessages[]|ObjectCollection findByMessage(string $message) Return ChildChatMessages objects filtered by the message column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByMessage(string $message) Return ChildChatMessages objects filtered by the message column
 * @method     ChildChatMessages[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildChatMessages objects filtered by the created_at column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByCreatedAt(string $created_at) Return ChildChatMessages objects filtered by the created_at column
 * @method     ChildChatMessages[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildChatMessages objects filtered by the updated_at column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByUpdatedAt(string $updated_at) Return ChildChatMessages objects filtered by the updated_at column
 * @method     ChildChatMessages[]|ObjectCollection findByDeletedAt(string $deleted_at) Return ChildChatMessages objects filtered by the deleted_at column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByDeletedAt(string $deleted_at) Return ChildChatMessages objects filtered by the deleted_at column
 * @method     ChildChatMessages[]|ObjectCollection findByCreatedBy(int $created_by) Return ChildChatMessages objects filtered by the created_by column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByCreatedBy(int $created_by) Return ChildChatMessages objects filtered by the created_by column
 * @method     ChildChatMessages[]|ObjectCollection findByUpdatedBy(int $updated_by) Return ChildChatMessages objects filtered by the updated_by column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByUpdatedBy(int $updated_by) Return ChildChatMessages objects filtered by the updated_by column
 * @method     ChildChatMessages[]|ObjectCollection findByDeletedBy(int $deleted_by) Return ChildChatMessages objects filtered by the deleted_by column
 * @psalm-method ObjectCollection&\Traversable<ChildChatMessages> findByDeletedBy(int $deleted_by) Return ChildChatMessages objects filtered by the deleted_by column
 * @method     ChildChatMessages[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildChatMessages> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChatMessagesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \code\models\Base\ChatMessagesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\code\\models\\ChatMessages', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChatMessagesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChatMessagesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChatMessagesQuery) {
            return $criteria;
        }
        $query = new ChildChatMessagesQuery();
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
     * @return ChildChatMessages|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChatMessagesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ChatMessagesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildChatMessages A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT message_id, chat_id, message, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by FROM public.chat_messages WHERE message_id = :p0';
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
            /** @var ChildChatMessages $obj */
            $obj = new ChildChatMessages();
            $obj->hydrate($row);
            ChatMessagesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildChatMessages|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatMessagesTableMap::COL_MESSAGE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatMessagesTableMap::COL_MESSAGE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the message_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMessageId(1234); // WHERE message_id = 1234
     * $query->filterByMessageId(array(12, 34)); // WHERE message_id IN (12, 34)
     * $query->filterByMessageId(array('min' => 12)); // WHERE message_id > 12
     * </code>
     *
     * @param     mixed $messageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByMessageId($messageId = null, $comparison = null)
    {
        if (is_array($messageId)) {
            $useMinMax = false;
            if (isset($messageId['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_MESSAGE_ID, $messageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($messageId['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_MESSAGE_ID, $messageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_MESSAGE_ID, $messageId, $comparison);
    }

    /**
     * Filter the query on the chat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByChatId(1234); // WHERE chat_id = 1234
     * $query->filterByChatId(array(12, 34)); // WHERE chat_id IN (12, 34)
     * $query->filterByChatId(array('min' => 12)); // WHERE chat_id > 12
     * </code>
     *
     * @param     mixed $chatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByChatId($chatId = null, $comparison = null)
    {
        if (is_array($chatId)) {
            $useMinMax = false;
            if (isset($chatId['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_CHAT_ID, $chatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chatId['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_CHAT_ID, $chatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_CHAT_ID, $chatId, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%', Criteria::LIKE); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_MESSAGE, $message, $comparison);
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
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
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
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_DELETED_AT, $deletedAt, $comparison);
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
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_CREATED_BY, $createdBy, $comparison);
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
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_UPDATED_BY, $updatedBy, $comparison);
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
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function filterByDeletedBy($deletedBy = null, $comparison = null)
    {
        if (is_array($deletedBy)) {
            $useMinMax = false;
            if (isset($deletedBy['min'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_DELETED_BY, $deletedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedBy['max'])) {
                $this->addUsingAlias(ChatMessagesTableMap::COL_DELETED_BY, $deletedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatMessagesTableMap::COL_DELETED_BY, $deletedBy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChatMessages $chatMessages Object to remove from the list of results
     *
     * @return $this|ChildChatMessagesQuery The current query, for fluid interface
     */
    public function prune($chatMessages = null)
    {
        if ($chatMessages) {
            $this->addUsingAlias(ChatMessagesTableMap::COL_MESSAGE_ID, $chatMessages->getMessageId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the public.chat_messages table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChatMessagesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChatMessagesTableMap::clearInstancePool();
            ChatMessagesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ChatMessagesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChatMessagesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChatMessagesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChatMessagesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChatMessagesQuery
