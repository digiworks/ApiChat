<?php
use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1653921564.
 * Generated on 2022-05-30 14:39:24  
 */
class PropelMigration_1653921564 
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

ALTER TABLE "public"."chats"

  ADD "last_message_at" TIMESTAMP;

CREATE INDEX "idx_last_message_at" ON "public"."chats" ("last_message_at");

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

DROP INDEX "public"."idx_last_message_at";

ALTER TABLE "public"."chats"

  DROP COLUMN "last_message_at";

COMMIT;
EOT;

        return array(
            'default' => $connection_default,
        );
    }

}