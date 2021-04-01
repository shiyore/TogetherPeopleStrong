<?php
namespace App\Services\Businesses;

use App\Models\PortfolioModel;
use App\Services\Data\PortfolioDAO;
use App\Services\Data\DBConnect;
use App\Models\UserModel;

class PortfolioService
{
    public function checkPortfolio(PortfolioModel $port)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->checkPortfolio($port);
    }
    public function updatePortfolio(PortfolioModel $port)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->updatePortfolio($port);
    }
    public function createPortfolio(PortfolioModel $port)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->createPortfolio($port);
    }
}