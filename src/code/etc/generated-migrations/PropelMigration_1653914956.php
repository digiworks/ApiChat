<?php
use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1653914956.
 * Generated on 2022-05-30 12:49:16  
 */
class PropelMigration_1653914956 
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

ALTER TABLE "public"."chats" RENAME COLUMN "user_id" TO "userid";

ALTER TABLE "public"."chats"

  ADD "userid_conect" INTEGER NOT NULL;

CREATE INDEX "idx_userid_conect" ON "public"."chats" ("userid_conect");

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

DROP INDEX "public"."idx_userid_conect";

ALTER TABLE "public"."chats" RENAME COLUMN "userid" TO "user_id";

ALTER TABLE "public"."chats"

  DROP COLUMN "userid_conect";

COMMIT;
EOT;

        return array(
            'default' => $connection_default,
        );
    }

}