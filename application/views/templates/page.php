<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Nav Bhatti - Assignment #1</title>
	{styles}
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                	{pages}
                		<li>{link}<li>
                	{/pages}
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
    	{content}
    </div>
</body>
{scripts}
</html>