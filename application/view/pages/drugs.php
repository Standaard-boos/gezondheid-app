<?php

?>
<div class="container-form">
    <h1 class="title">Drugs toevoegen</h1>
    <form class="form" action="/register" method="post">
        <div class="input-icon">
            <select class="input">
                <option value="Speed">Speed</option> 
                <option value="Cocaïne">Cocaïne</option> 
                <option value="GHB">GHB</option> 
                <option value="Cannabis">Cannabis (hasj en wiet)</option> 
                <option value="Heroïne">Heroïne</option> 
                <option value="LSD">LSD</option> 
                <option value="Methadon">Methadon</option> 
                <option value="PD">Paddo’s en truffels</option> 
                <option value="XTC">XTC</option> 
                <option value="Kheta">Kheta</option> 
            </select>
        </div>
        <div class="input-icon">
            <h4 class="input-icon">Hoeveel heb je genomen? </h4>
        </div>
        <div class="input-icon">
        <select class="input">
                <option value="kwart">1/4</option> 
                <option value="halve">1/2</option> 
                <option value="diekwart">3/4</option> 
                <option value="een">1 (Pil, Spuit, lijntje, gram)</option> 
                <option value="twee">2</option> 
                <option value="drie">3</option> 
                <option value="over3">Meer dan 3</option> 
            </select>
        </div>
        <button class="button" name="submit" type="submit">Drugs toevoegen</button>
    </form>
</div>


