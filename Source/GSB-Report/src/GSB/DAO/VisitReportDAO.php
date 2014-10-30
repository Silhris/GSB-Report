<?php

namespace GSB\DAO;

use GSB\Domain\VisitReport;
/**
 * Description of VisitReport
 *
 * @author acrep
 */
class VisitReportDAO extends DAO
{
    /**
     * @var \GSB\DAO\FamilyDAO
     */
    private $visitorDAO;

    public function setVisitorDAO($visitorDAO) {
        $this->visitorDAO = $visitorDAO;
    }
    
    private $practitionerDAO;

    public function setPractitionerDAO($practitionerDAO) {
        $this->practitionerDAO = $practitionerDAO;
    }
    /**
     * Returns the list of all drugs, sorted by trade name.
     *
     * @return array The list of all drugs.
     */
    public function findAll() {
        $sql = "select * from visit_report order by reporting_date";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $reports = array();
        foreach ($result as $row) {
            $reportId = $row['report_id'];
            $reports[$reportId] = $this->buildDomainObject($row);
        }
        return $reports;
    }
    
    /**
     * Returns the family matching the given id.
     *
     * @param integer $id The family id.
     *
     * @return \GSB\Domain\Family|throws an exception if no family is found.
     */
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }
    
     /* Creates a Drug instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\VisitReport
     */
    public function buildDomainObject($row) {
        
        $practitionerId = $row['practitioner_id'];
        $practitioner = $this->practitionerDAO->find($practitionerId);

        $visitReport = new VisitReport();
        $visitReport->setId($row['report_id']);
        $visitReport->setReportingDate($row['reporting_date']);
        $visitReport->setAssessment($row['assessment']);
        $visitReport->setVisitorId($row['visitor_id']);
        $visitReport->setPurpose($row['purpose']);
        $visitReport->setPractitionerId($practitioner);
        return $visitReport;
    }
}