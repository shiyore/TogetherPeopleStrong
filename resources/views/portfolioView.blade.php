@extends('layouts.app')
<?php use App\Models\PortfolioModel?>
<?php $portfolio = new PortfolioModel(request()->get('name'), request()->get('position'), request()->get('experience'), request()->get('proficiencies'))?>
@section('content')
<h1 align="center"><?php echo $portfolio->getName()?>'s Portfolio</h1>
<div align="center">
	<h2><?php echo $portfolio->getPosition()?></h2>
	<h3><?php echo $portfolio->getExperience()?></h3>
</div>
<div align="center">
	<h3><?php echo $portfolio->getProficiencies()?></h3>
</div>