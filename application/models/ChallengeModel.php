<?php

defined('STUDENTTABLE') or define('STUDENTTABLE', "student");
defined('SUBMISSIONTABLE') or define('SUBMISSIONTABLE', 'submission');
defined('CHALLENGETABLE') or define('CHALLENGETABLE', 'challenge');

class ChallengeModel extends CI_Model
{
    protected $studentTable;
    protected $challengeTable;
    protected $submissionTable;

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * getTotalScores
     * Get the sum of all scores for each student
     * @return array
     */
    public function getTotalScores()
    {
        $this->db->select(STUDENTTABLE.'.username');
        $this->db->select_sum(SUBMISSIONTABLE.'.score');
        $this->db->from(SUBMISSIONTABLE);
        $this->db->join(STUDENTTABLE, SUBMISSIONTABLE.'.student = '.STUDENTTABLE.'.number', 'left');
        $this->db->group_by(STUDENTTABLE.'.username');
        $this->db->order_by('score', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * getChallengesPerWeek
     * Get all the challenges for a given week.
     * @param int $week
     * @return array
     */
    public function getChallengesPerWeek($week)
    {
        $this->db->select("id, week, letter, description");
        $this->db->from(CHALLENGETABLE);
        $this->db->where("week", $week);

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * getChallengeScores
     * Get all the scores for a given challenge
     * @param int $challenge The id for the challenge
     * @return void
     */
    public function getChallengeScores($challenge)
    {
        $this->db->select("username, score");
        $this->db->from(SUBMISSIONTABLE);
        $this->db->join(CHALLENGETABLE, SUBMISSIONTABLE . '.challenge = ' . CHALLENGETABLE . '.id', 'left');
        $this->db->join(STUDENTTABLE, SUBMISSIONTABLE . '.student = ' . STUDENTTABLE . '.number', 'left');
        $this->db->where(CHALLENGETABLE . '.id', $challenge);
        $this->db->order_by("score", "DESC");

        $query = $this->db->get();
        return $query->result_array();
    }
}

?>