INSERT INTO `#__modules` (`title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES ('Need support?', '', '<p>You can find help here:</p><ul class="list-unstyled"><li><a href="https://forum.joomla.org/" target="_blank" rel="nofollow">Joomla! Support forum</a></li><li><a href="https://docs.joomla.org" target="_blank" rel="nofollow">Joomla! Documentation</a></li><li><a href="https://www.joomla.org/" target="_blank" rel="nofollow">Joomla! News</a></li></ul>', 1, 'sidebar', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 1, '{"prepare_content":1,"layout":"_:default","moduleclass_sfx":"","cache":1,"cache_time":900,"module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 1, '*');
INSERT INTO `#__modules_menu` (`moduleid`, `menuid`) VALUES (LAST_INSERT_ID(), 0);