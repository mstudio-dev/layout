<?php

namespace Netzmacht\Bootstrap\Layout\Migrate;

class runonce
{
    public function execute()
    {
        $database = \Database::getInstance();

        if (!$database->fieldExists('bootstrap_sections', 'tl_layout')) {
            return;
        }

        // make sure flexible sections exists
        if (!$database->fieldExists('flexible_sections', 'tl_layout')) {
            $database->query('ALTER TABLE tl_layout ADD flexible_sections blob NULL');
        }

        $query = <<<SQL
UPDATE  tl_layout
SET     bootstrap_section=flexible_sections
WHERE   bootstrap_section != '' AND flexible_sections = ''
SQL;

        $database->query($query);
    }
}

$runonce = new runonce;
$runonce->execute();