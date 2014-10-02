<?php

namespace GSB\DAO;

use GSB\Domain\PractitionerType;

class PractitionerTypeDAO extends DAO
{
    /**
     * Returns the list of all type, sorted by name.
     *
     * @return array The list of all families.
     */
    public function findAll() {
        $sql = "select * from practitioner_type order by practitioner_type_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $types = array();
        foreach ($result as $row) {
            $typeId = $row['practitioner_type'];
            $types[$typeId] = $this->buildDomainObject($row);
        }
        return $types;
    }

    /**
     * Returns the types matching the given id.
     *
     * @param integer $id The type id.
     *
     * @return \GSB\Domain\PractitionerType|throws an exception if no type is found.
     */
    public function find($id) {
        $sql = "select * from type where practitioner_type=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No type found for id " . $id);
    }

    /**
     * Creates a Family instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Family
     */
    protected function buildDomainObject($row) {
        $type = new PractitionerType();
        $type->setId($row['practitioner_type']);
        $type->setName($row['practitioner_type']);
        return $type;
    }
}