<?php
/*
 * Project: TogetherPeopleStrong ver.4
 * @author: Carson Perry
 * Module: Portfolios ver. 2
 * Date: 04/18/21
 * Synopsis: This is the controller that handles Portfolio routing and information gathering.
 * References: References the portfolio model and the portfolio business service to load information into models to pass into pages.
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Businesses\SecurityService;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\PortfolioModel;
use App\Services\Businesses\PortfolioService;

class PortfolioController extends Controller
{
    public function update(Request $request)
    {
        //$user = new UserModel(request()->get('user_name'), request()->get('email'), request()->get('password'));
        $portfolio = new PortfolioModel(request()->get('name'), request()->get('position'), request()->get('experience'), request()->get('proficiencies'), request()->get('bio'));
        
        $service = new PortfolioService();
        
        $exists = $service->checkPortfolio($portfolio);
        
        if ($exists)
        {
            //echo '<h2> does exist</h2>';
            if ($service->updatePortfolio($portfolio))
            {
                //return view('portfolioView', $arr);
                return view('portfolioView')->with('portfolio', $portfolio);
            }
        }
        else 
        {
            //echo '<h2> does not exist</h2>';
            if ($service->createPortfolio($portfolio))
            {
                //return view('portfolioView', $arr);
                return view('portfolioView')->with('portfolio', $portfolio);
            }
        }
        return view('portfolio_failure');
    }
    
    public function loadPortfolioScreen(Request $request)
    {
        $serv = new PortfolioService();
        $exists = $serv->doesUserHavePortfolio(Auth::id());
        if ($exists)
        {
            $port = $serv->getPortfolioByUid(Auth::id());
            return view('User_Information')->with(["portfolio" => $port, "exists"=> $exists]);
        }
        else 
        {
            return view('User_Information')->with('exists', $exists);
        }
    }
    
    public function viewMyPortfolio(Request $request)
    {
        $serv = new PortfolioService();
        $exists = $serv->doesUserHavePortfolio(Auth::id());
        if ($exists)
        {
            $portfolio = $serv->getPortfolioByUid(Auth::id());
            return view('portfolioView')->with('portfolio', $portfolio);
        }
        else
        {
            return view('User_Information')->with('exists', $exists);
        }
    }
    
    public function viewAll(Request $request)
    {
        $service = new PortfolioService();
        $portfolioArr = $service->getAll();
        return view('portfolioViewAll')->with('portfolios', $portfolioArr);
        
    }
    public function viewPortfolio(Request $request)
    {
        //$portfolio = new PortfolioModel(request()->get('name'), request()->get('position'), request()->get('experience'), request()->get('proficiencies'), request()->get('bio'));
        $service = new PortfolioService();
        $portfolio = $service->getPortfolioByName($request->get('name'));
        return view('portfolioView')->with('portfolio', $portfolio);
    }
}