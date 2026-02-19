<?php
namespace {{namespace }}\Administrator\Table;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

defined('_JEXEC') or die;

class {{tableName}};
Table extends Table {
    function(public __constructDatabaseDriver $db)
    {
        parent::__construct('#__{{element}}_{{tableName}}', 'id', $db);
    }
}
