<?php
use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1653906878.
 * Generated on 2022-05-30 10:34:38  
 */
class PropelMigration_1653906878 
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        $connection_default = <<< 'EOT'

BEGIN;

CREATE TABLE "public"."chats"
(
    "id" serial NOT NULL,
    "user_id" INTEGER NOT NULL,
    "status" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP,
    "created_by" INTEGER,
    "updated_by" INTEGER,
    "deleted_by" INTEGER,
    PRIMARY KEY ("id")
);

CREATE TABLE "public"."chat_messages"
(
    "message_id" serial NOT NULL,
    "chat_id" INTEGER NOT NULL,
    "message" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP,
    "created_by" INTEGER,
    "updated_by" INTEGER,
    "deleted_by" INTEGER,
    PRIMARY KEY ("message_id")
);

COMMIT;
EOT;

        return array(
            'default' => $connection_default,
        );
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        $connection_default = <<< 'EOT'

BEGIN;

DROP TABLE IF EXISTS "public"."chats" CASCADE;

DROP TABLE IF EXISTS "public"."chat_messages" CASCADE;

COMMIT;
EOT;

        return array(
            'default' => $connection_default,
        );
    }

}