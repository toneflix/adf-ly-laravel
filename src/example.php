<?php
	require_once '../../Examples/PHP/PhpExample.php';
		/**
		 * Example script entry point.
		 */
		function main() {
            define('LB',"<br />\r\n");

            $ex = new PhpExample(2, '2ba3f6ce601d043c177eb2a83eb34f5f', '4c8fa05a-d826-4c06-86e4-59b86bf4868c');

//             //echo "Starting the demo...".LB.LB;
//             echo "SHORTENING...".LB;

// 			// Shorten Url
//             $res = $ex->shorten(array('http://stackoverflow.com/users'), 'adfly.local');
//             $shortenedUrl1 = $res['data'][0];
//             $hash1 = substr($shortenedUrl1['short_url'],strrpos($shortenedUrl1['short_url'],'/')+1);
//             echo 'First URL shortened (' . $hash1 . '): ' . print_r($res,1) . LB;

//             $res = $ex->shorten(array('http://www.reddit.com'), 'q.gs');
//             $shortenedUrl2 = $res['data'][0];
//             $hash2 = substr($shortenedUrl2['short_url'],strrpos($shortenedUrl2['short_url'],'/')+1);
//             echo 'Another URL shortened (' . $hash2 . '): ' . print_r($res,1) . LB;

//             $res = $ex->shorten(array('www.youtube.com'), 'q.gs', 'banner');
//             $shortenedUrl3 = $res['data'][0];
//             echo 'Another URL shortened: ' . print_r($res,1) . LB;

//             $res = $ex->shorten(array('http://www.len10.com/videos/'), 'q.gs', 'int', 13);
//             $shortenedUrl4 = $res['data'][0];
//             echo 'Another URL shortened: ' . print_r($res,1) . LB;

//             echo LB."EXPAND...".LB;
//             // Expand examples.
//             echo 'Shortened URLS just created: ' . print_r($ex->expand(array($shortenedUrl3['short_url'],$shortenedUrl4['short_url']),array($hash1,$hash2)),1);

//             echo LB."LISTING...".LB;
//             //List Urls
//             $urlList = $ex->getUrls();
//             echo 'Listing page 1 URLS...: ' . print_r($urlList,1);

//             //Update Url
//             echo LB."UPDATING LINK...".LB;
//             $ex->updateUrl($shortenedUrl1['id'], 'http://modifiedurlaaaa.cat', "int", "The  updated URL", 13, false, false);
//             echo 'Modified URL: ' . print_r($ex->expand(array(),array($hash1)),1);

//             foreach($urlList['data'] as $url){
//                 echo 'Deleting URL ID: ' . $url['id'] . LB;
//                 $ex->deleteUrl($url['id']);
//             }

//             echo LB."LISTING AGAIN...".LB;
//             //List Urls
//             $urlList = $ex->getUrls();
//             echo 'Listing page 1 URLS...: ' . print_r($urlList,1) . LB;

//             //GROUPS
//             echo LB."GROUPS".LB;
//             $g = $ex->createGroup('API Group');
//             echo 'Created group: ' . print_r($g,1).LB;

//             $g = $ex->getGroups(1);
//             echo 'Listing page 1 GROUPS...: ' . print_r($g,1).LB;

//             //REFERRERS GET
//             echo LB."REFERRERS".LB;
//             $res = $ex->getReferrers();
//             echo 'URL Referrers: ' . print_r($res,1).LB;

//             //COUNTRIES GET
//             echo LB."COUNTRIES".LB;
//             $res = $ex->getCountries();
//             echo 'URL Countries: ' . print_r($res,1).LB;

//             //ANNOUNCEMENTS GET
//             echo LB."ANNOUNCEMENTS".LB;
//             $res = $ex->getAnnouncements();
//             echo 'Announcements: ' . print_r($res,1).LB;

//             //publisherReferralStats GET
//             echo LB."PUBLISHER REFERRAL STATS".LB;
//             $res = $ex->getPublisherReferrals();
//             echo 'Stats: ' . print_r($res,1).LB;

//             //advertiserReferralStats GET
//             echo LB."ADVERTISER REFERRAL STATS".LB;
//             $res = $ex->getAdvertiserReferrals();
//             echo 'Stats: ' . print_r($res,1).LB;

//             ///withdrawalTransactions GET
//             echo LB."WITHDRAWAL TRANSACTRIONS".LB;
//             $res = $ex->getWithdrawalTransactions();
//             echo 'Transactions: ' . print_r($res,1).LB;

//             ///withdraw GET
//             echo LB."WITHDRAW".LB;
//             $res = $ex->getWithdraw();
//             echo 'Data: ' . print_r($res,1).LB;

//             ///withdraw request GET
//             echo LB."WITHDRAW REQUEST START".LB;
//             $res = $ex->withdrawRequestInitiate();
//             echo 'Data: ' . print_r($res,1).LB;
             
//             ///withdraw request DELETE
//             echo LB."WITHDRAW REQUEST CANCEL".LB;
//             $res = $ex->withdrawRequestCancel();
//             echo 'Data: ' . print_r($res,1).LB;
            
            
//             //publisherStats GET
//             echo LB."PUBLISHER STATS".LB;
//             $res = $ex->getPublisherStats();
//             echo 'Stats: ' . print_r($res,1).LB;

//             //user Profile GET
//             echo LB."USER PROFILE".LB;
//             $res = $ex->getProfile();
//             echo 'User: ' . print_r($res,1).LB;

//             //advertiserStats GET
//             echo LB."ADVERTISER STATS".LB;
//             $res = $ex->getAdvertiserCampaigns();
//             echo 'Stats: ' . print_r($res,1).LB;

//             //advertiserStats GET
//             echo LB."ADVERTISER GRAPH".LB;
//             $res = $ex->getAdvertiserGraph(null,156);
//             echo 'Stats: ' . print_r($res,1).LB;
            
//             //advertiserStats GET
//             echo LB."ADVERTISER STATS".LB;
//             $res = $ex->getAdvertiserCampaignParts(739026);
//             echo 'Stats: ' . print_r($res,1).LB;

//             //auth POST
//             echo LB."AUTH".LB;
//             $res = $ex->auth('1', '2');
//             echo 'Auth: ' . print_r($res,1).LB;
			
            // account publisher referrals
//             echo LB."ACCOUNT PUBLISHER REFERRALS".LB;
//             $res = $ex->getAccountPubReferrals('', '', 1, 1);
// 			echo 'Referrals: ' . print_r($res, 1).LB;

            // account advertiser referrals
//              echo LB."ACCOUNT ADVERTISER REFERRALS".LB;
//              $res = $ex->getAccountAdvReferrals('', '', 1, 1);
//  			echo 'Referrals: ' . print_r($res, 1).LB;
            
            // account popad referrals
//             echo LB."ACCOUNT POPAD REFERRALS".LB;
//             $res = $ex->getAccountPopReferrals('', '', 1, 1);
// 			echo 'Referrals: ' . print_r($res, 1).LB;

            // account total referrals
//              echo LB."ACCOUNT TOTAL REFERRALS".LB;
//              $res = $ex->getAccountTotalReferrals();
//  			echo 'Referrals: ' . print_r($res, 1).LB;

            // account popad referrals
//              echo LB."DOMAINS".LB;
//              $res = $ex->getDomains();
//  			echo 'Domains: ' . print_r($res, 1).LB;

            // update account details
//             echo LB."UDATE ACCOUNT DETAILS".LB;
//             $res = $ex->updateAccountDetails([]);
//             echo 'Result: ' . print_r($res, 1).LB;

            // update account details
//             echo LB."UDATE ACCOUNT PASSWORD".LB;
//             $res = $ex->updatePassword('oldpassword', 'newpassword', 'newpassword');
//             echo 'Result: ' . print_r($res, 1).LB;

           // get account countries
//              echo LB."ACCOUNT COUNTRIES".LB;
//              $res = $ex->getAccountCountries();
//              echo 'Result: ' . print_r($res, 1).LB;

            // get account countries
//              echo LB."ACCOUNT DETAILS".LB;
//              $res = $ex->getAccountDetails();
//              echo 'Result: ' . print_r($res, 1).LB;
        }

	// Runs usage examples.
	main();