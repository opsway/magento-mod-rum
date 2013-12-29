Magento module for site performance real-user monitoring (RUM) using GoogleAnalytics
==========

Module is based on [boomerang.js library] [1] and it is inspired by [great presentation done by Philip Tellis] [2]

How does it work?
-----------
1. On every page load module is trying to page type using Magento layout handles.
Page types includes: homepage, category page, product page, my account, etc

2. Once in a while for defined %% of users we try to find out user Bandwidth and Latency and put it in Google Analytics Custom variables.
Check js/boomerang/boomerang.js for details, see formatBwLatency() function
Currently the list of bandwidth and latency variants is the following:

Bandwidth:

* <64Kb/s
* 64Kb/s-512Kb/s
* 512Kb/s-2Mb/s
* 2Mb/s-6Mb/s
* 6Mb/s-10Mb/s
* >10Mb/s

Latency:

* <50ms
* 50-100ms
* 100-200ms
* 200-400ms
* 400-1000ms
* >1000ms


Usage
-----------

1. Install to Magento by copying to directory structure
2. You can specify site domain in System->Configuration->Web->Cookie domain 
Boomerang.js will save calculated bandwidth/latency for a user in cookie, using this cookie domain.
This option is needed if you plan to use module when you have multiple sub-domains
3. By default bandwidth and latency is captured for 3% of users. You can change this number now in code of boomerang.phtml

4. Finally you can go to Google Analytics and find:

* User timings for each page type
* Events (basically clicks) for each page type
* Events flow
* Custom variables 1 and 2, which hold bandwidth and latency respectively. You can the build advanced segments arond

TODO
-----------

1. Specify %% of users to measure bandwidth & latency via Magento backoffice
2. Make getPageType() extensible through extending the class

[1] https://github.com/lognormal/boomerang/
[2] http://www.slideshare.net/bluesmoon/boomerang-how-fast-do-users-think-your-site-is