<?php

namespace GSB\DAO;

use GSB\Domain\VisitReport;

class VisitReportDAO extends DAO{
    
    private $practitionerDAO;
    private $visitorDAO;
    
    public function setPractitionerDAO($practitionerDAO) {
        $this->practitionerDAO = $practitionerDAO;
    }

    public function setVisitorDAO($visitorDAO) {
        $this->visitorDAO = $visitorDAO;
    }
    
    public function findAll(){
        $sql="select * from visit_report order by reporting_date";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $visitReports = array();
        foreach ($result as $row) {
            $visitReportId = $row['report_id'];
            $visitReports[$visitReportId] = $this->buildDomainObject($row);
        }
        return $visitReports;
               
    }
    
    public function find($id) {
        $sql = "select * from visit_report where report_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No report found for id " . $id);
    }
    
    /**
     * Creates a Practitioner instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\VisitReport
     */
    protected function buildDomainObject($row) {
        
        $practitionerId= $row['practitioner_id'];
        $practitioner = $this->practitionerDAO->find($practitionerId);
        
        $visitorId= $row['visitor_id'];
        $visitor = $this->visitorDAO->find($visitorId);

        $reportVisit = new VisitReport();
        $reportVisit->setReportId($row['report_id']);
        $reportVisit->setPractitionerId($practitioner);
        $reportVisit->setVisitorId($visitor);
        $reportVisit->setReportingDate($row['reporting_date']);
        $reportVisit->setAssessment($row['assessment']);
        $reportVisit->setPurpose($row['purpose']);
        
        return $reportVisit;
    }
    


    
}
