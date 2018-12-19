<?php
class Challenges extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('challengeModel');
        $this->load->helper('url_helper');
    }

    /**
     * index
     * Main page showing the main rankings
     * @return void
     */
    public function index()
    {
        $data['title'] = "Hoofdranking";
        $data['scores'] = $this->challengeModel->getTotalScores();

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('hoofdranking', $data);
        $this->load->view('templates/footer', $data);
    }

    /**
     * getChallengesForWeek
     * Get the challenge description and scores for challenges in a given week
     * @param int $week
     * @return void
     */
    public function getChallengesForWeek($week)
    {
        $challenges = $this->challengeModel->getChallengesPerWeek($week);
        if(empty($challenges))
            show_404();
        
        $i = 0;
        $c = count($challenges);
        while($i < $c)
        {
            $challenges[$i]['scores'] = $this->challengeModel->getChallengeScores($challenges[$i]['id']); 
            $i++;
        }

        $data['title'] = 'Challenges voor week '. $week;
        $data['challenges'] = $challenges;

        $data['stuff'] = $this->challengeModel->getChallengeScores(1);

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('challengeList', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>