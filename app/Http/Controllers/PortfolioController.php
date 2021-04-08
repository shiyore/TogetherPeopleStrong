<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $portfolio = new PortfolioModel(request()->get('name'), request()->get('position'), request()->get('experience'), request()->get('proficiencies'));
        
        $service = new PortfolioService();
        
        $exists = $service->checkPortfolio($portfolio);
        $arr = [request()->get('name'), request()->get('position'), request()->get('experience'), request()->get('proficiencies')];
        
        if ($exists)
        {
            //echo '<h2> does exist</h2>';
            if ($service->updatePortfolio($portfolio))
            {
                return view('portfolioView', $arr);
            }
        }
        else 
        {
            //echo '<h2> does not exist</h2>';
            if ($service->createPortfolio($portfolio))
            {
                return view('portfolioView', $arr);
            }
        }
        return view('portfolio_failure');
    }
}