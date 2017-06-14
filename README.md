# exec_grapevine

configurations
------------
"/config/config.php"

Default setup
----------------
Controller name => c_default,
Model name => m_default,
View name => v_default,
Root folder => exec_grapevine

To run the script
------------------
simply open the root folder in your browser, and the default controller specified in the configurations will be automatically loaded through
or you can manually use the routing pattern below if declaring a custome controller.

Routing
--------
"//example.com/[root_folder]/?c=[controller]&m=[method]";

FYI
---
No database was used as instructed, all data was stored in an array even tho a relational database will produce a more accurate result.



