CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL auto_increment,
  `c_name` varchar(40) NOT NULL,
  `add_by` varchar(40) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `node_category`
--

CREATE TABLE IF NOT EXISTS `node_category` (
  `nc_id` int(11) NOT NULL auto_increment,
  `nid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY  (`nc_id`),
  KEY `nid` (`nid`,`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `node_tag`
--

CREATE TABLE IF NOT EXISTS `node_tag` (
  `nt_id` int(11) NOT NULL auto_increment,
  `nid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY  (`nt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_node`
--

CREATE TABLE IF NOT EXISTS `post_node` (
  `nid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `n_url` varchar(200) NOT NULL,
  `n_name` varchar(100) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY  (`nid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `tid` int(11) NOT NULL auto_increment,
  `t_name` varchar(30) NOT NULL,
  `add_by` varchar(40) NOT NULL,
  PRIMARY KEY  (`tid`),
  UNIQUE KEY `t_name` (`t_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(20) unsigned NOT NULL auto_increment,
  `username` varchar(40) default NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(100) default NULL,
  `role` varchar(30) NOT NULL,
  `register_date` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;
