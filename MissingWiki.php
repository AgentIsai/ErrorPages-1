
<?php

if ( !$wgCommandLineMode ) {
	http_response_code( 404 );

	$output = <<<EOF
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<meta name="description" content="Wiki not found" />
				<title>Wiki Not Found</title>
				<link rel="icon" type="image/x-icon" href="https://meta.wikiforge.net/favicon.ico" />
				<link rel="apple-touch-icon" href="https://meta.wikiforge.net/apple-touch-icon.png" />
				<!-- Bootstrap core CSS -->
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"/>
				<style>
					/* Error Page Inline Styles */
					body {
						padding-top: 20px;
					}
					/* Layout */
					.jumbotron {
						font-size: 21px;
						font-weight: 200;
						line-height: 2.1428571435;
						color: inherit;
						padding: 10px 0px;
						text-align: center;
						background-color: transparent;
					}
					/* Everything but the jumbotron gets side spacing for mobile-first views */
					.body-content {
						padding-left: 15px;
						padding-right: 15px;
					}
					/* button */
					.jumbotron .btn {
						font-size: 21px;
						padding: 14px 24px;
					}
					/* Fade-in */
					@keyframes fadein {
						from { opacity: 0; }
						to { opacity: 1; }
					}
					/* Bottom links */
					.bottom-links {
						display: flex;
						justify-content: space-between;
						margin: 30px auto;
						max-width: 100%;
						text-align: center;
						width: 600px;
					}
					/* Dark mode */
					@media (prefers-color-scheme: dark) {
						body {
							background-color: #282828;
						}
						h1, p {
							color: white;
						}
					}
				</style>
			</head>
			<div class="container">
				<!-- Jumbotron -->
				<div class="jumbotron">
					<p style="font-align: center; animation: fadein 1s;"><img src="https://static.wikiforge.net/metawiki/8/88/WikiForge_Logo.svg" alt="WikiForge Logo" /></p>
					<h1>Wiki Not Found</h1>
					<p class="lead">We couldn't find this wiki. Check your spelling and try again.</p>
					<p>
						<a href="https://meta.wikiforge.net/wiki/Special:RequestWiki?wpsubdomain={substr( $wgDBname, 0, -4 )}" class="btn btn-lg btn-outline-primary" role="button">Request the Wiki</a>
					</p>
				</div>
			</div>
			<div class="bottom-links">
				<a href="#" onClick="history.go(-1); return false;">&larr; Go back</a>
				<a href="https://meta.wikiforge.net/wiki/Special:MyLanguage/WikiForge">Go to WikiForge Meta</a>
			</div>
		</html>
	EOF;
	header( 'Content-length: ' . strlen( $output ) );
	echo $output;
	die( 1 );
} else {
	// $wgDBname will always be set to a string, even if the --wiki parameter was not passed to a script.
	echo "The wiki database '{$wgDBname}' was not found." . PHP_EOL;
}