<?php
/*
$Id: articles.tpl.php 1692 2012-02-26 01:26:50Z michael.oscmax@gmail.com $

  osCmax e-Commerce
  http://www.osCmax.com

  Copyright 2000 - 2011 osCmax

  Released under the GNU General Public License
*/
?>
<table border="0" width="100%" cellspacing="3" cellpadding="3">
  <tr>
  
    <!-- body_text //-->
    <?php
    if ($topic_depth == 'nested') {
    $topic_query = tep_db_query("select td.topics_name, td.topics_heading_title, td.topics_description from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.topics_id = '" . (int)$current_topic_id . "' and td.topics_id = '" . (int)$current_topic_id . "' and td.language_id = '" . (int)$languages_id . "'");
    $topic = tep_db_fetch_array($topic_query);
    ?>
    <td width="100%" valign="top">
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td class="productinfo_header">
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top" class="pageHeading">
                  <?php
/* bof catdesc for bts1a, replacing "echo HEADING_TITLE;" by "topics_heading_title" */
                if ( tep_not_null($topic['topics_heading_title']) ) {
                  echo $topic['topics_heading_title'];
                } else {
                  echo HEADING_TITLE;
                }
/* eof catdesc for bts1a */ ?>
                </td>
                <td valign="top" class="pageHeading" align="right">&nbsp;</td>
              </tr>
              <?php if ( tep_not_null($topic['topics_description']) ) { ?>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
              <tr>
                <td align="left" colspan="2" class="main"><?php echo $topic['topics_description']; ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
              <?php } ?>
            </table>
          </td>
        </tr>
        <tr>
          <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
        </tr>
        <tr>
          <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td>
                  <table border="0" width="100%" cellspacing="0" cellpadding="2">
                    <tr>
                    <?php
    if (isset($tPath) && strpos('_', $tPath)) {
// check to see if there are deeper topics within the current topic
      $topic_links = array_reverse($tPath_array);
      for($i=0, $n=sizeof($topic_links); $i<$n; $i++) {
        $topics_query = tep_db_query("SELECT COUNT(*) as total from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.parent_id = '" . (int)$topic_links[$i] . "' and t.topics_id = td.topics_id and td.language_id = '" . (int)$languages_id . "'");
        $topics = tep_db_fetch_array($topics_query);
        if ($topics['total'] < 1) {
          // do nothing, go through the loop
        } else {
          $topics_query = tep_db_query("select t.topics_id, td.topics_name, t.parent_id from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.parent_id = '" . (int)$topic_links[$i] . "' and t.topics_id = td.topics_id and td.language_id = '" . (int)$languages_id . "' order by sort_order, td.topics_name");
          break; // we've found the deepest topic the customer is in
        }
      }
    } else {
      $topics_query = tep_db_query("select t.topics_id, td.topics_name, t.parent_id from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.parent_id = '" . (int)$current_topic_id . "' and t.topics_id = td.topics_id and td.language_id = '" . (int)$languages_id . "' order by sort_order, td.topics_name");
    }

// needed for the new articles module shown below
    $new_articles_topic_id = $current_topic_id;
?>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
              <tr>
                <td>
                  <?php /*include(DIR_WS_MODULES . FILENAME_NEW_ARTICLES); */ ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <?php
    } elseif ($topic_depth == 'articles' || isset($_GET['authors_id'])) {

/* bof catdesc for bts1a */
// Get the topic name and description from the database
    $topic_query = tep_db_query("select td.topics_name, td.topics_heading_title, td.topics_description from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.topics_id = '" . (int)$current_topic_id . "' and td.topics_id = '" . (int)$current_topic_id . "' and td.language_id = '" . (int)$languages_id . "'");
    $topic = tep_db_fetch_array($topic_query);
/* bof catdesc for bts1a */

// show the articles of a specified author
    if (isset($_GET['authors_id'])) {
      if (isset($_GET['filter_id']) && tep_not_null($_GET['filter_id'])) {
// We are asked to show only a specific topic
        $listing_sql = "select a.articles_id, a.authors_id, a.articles_date_added, ad.articles_name, ad.articles_head_desc_tag, au.authors_name, td.topics_name, a2t.topics_id from " . TABLE_ARTICLES . " a left join " . TABLE_AUTHORS . " au using(authors_id), " . TABLE_ARTICLES_DESCRIPTION . " ad, " . TABLE_ARTICLES_TO_TOPICS . " a2t left join " . TABLE_TOPICS_DESCRIPTION . " td using(topics_id) where (a.articles_date_available IS NULL or to_days(a.articles_date_available) <= to_days(now())) and a.articles_status = '1' and au.authors_id = '" . (int)$_GET['authors_id'] . "' and a.articles_id = a2t.articles_id and ad.articles_id = a2t.articles_id and ad.language_id = '" . (int)$languages_id . "' and td.language_id = '" . (int)$languages_id . "' and a2t.topics_id = '" . (int)$_GET['filter_id'] . "' order by a.articles_date_added desc, ad.articles_name";
      } else {
// We show them all
        $listing_sql = "select a.articles_id, a.authors_id, a.articles_date_added, ad.articles_name, ad.articles_head_desc_tag, au.authors_name, td.topics_name, a2t.topics_id from " . TABLE_ARTICLES . " a left join " . TABLE_AUTHORS . " au using(authors_id), " . TABLE_ARTICLES_DESCRIPTION . " ad, " . TABLE_ARTICLES_TO_TOPICS . " a2t left join " . TABLE_TOPICS_DESCRIPTION . " td using(topics_id) where (a.articles_date_available IS NULL or to_days(a.articles_date_available) <= to_days(now())) and a.articles_status = '1' and au.authors_id = '" . (int)$_GET['authors_id'] . "' and a.articles_id = a2t.articles_id and ad.articles_id = a2t.articles_id and ad.language_id = '" . (int)$languages_id . "' and td.language_id = '" . (int)$languages_id . "' order by a.articles_date_added desc, ad.articles_name";
      }
    } else {
// show the articles in a given category
      if (isset($_GET['filter_id']) && tep_not_null($_GET['filter_id'])) {
// We are asked to show only specific catgeory
        $listing_sql = "select a.articles_id, a.authors_id, a.articles_date_added, ad.articles_name, ad.articles_head_desc_tag, au.authors_name, td.topics_name, a2t.topics_id from " . TABLE_ARTICLES . " a left join " . TABLE_AUTHORS . " au using(authors_id), " . TABLE_ARTICLES_DESCRIPTION . " ad, " . TABLE_ARTICLES_TO_TOPICS . " a2t left join " . TABLE_TOPICS_DESCRIPTION . " td using(topics_id) where (a.articles_date_available IS NULL or to_days(a.articles_date_available) <= to_days(now())) and a.articles_status = '1' and a.articles_id = a2t.articles_id and ad.articles_id = a2t.articles_id and ad.language_id = '" . (int)$languages_id . "' and td.language_id = '" . (int)$languages_id . "' and a2t.topics_id = '" . (int)$current_topic_id . "' and au.authors_id = '" . (int)$_GET['filter_id'] . "' order by a.articles_date_added desc, ad.articles_name";
      } else {
// We show them all
        $listing_sql = "select a.articles_id, a.authors_id, a.articles_date_added, ad.articles_name, ad.articles_head_desc_tag, au.authors_name, td.topics_name, a2t.topics_id from " . TABLE_ARTICLES . " a left join " . TABLE_AUTHORS . " au using(authors_id), " . TABLE_ARTICLES_DESCRIPTION . " ad, " . TABLE_ARTICLES_TO_TOPICS . " a2t left join " . TABLE_TOPICS_DESCRIPTION . " td using(topics_id) where (a.articles_date_available IS NULL or to_days(a.articles_date_available) <= to_days(now())) and a.articles_status = '1' and a.articles_id = a2t.articles_id and ad.articles_id = a2t.articles_id and ad.language_id = '" . (int)$languages_id . "' and td.language_id = '" . (int)$languages_id . "' and a2t.topics_id = '" . (int)$current_topic_id . "' order by a.articles_date_added desc, ad.articles_name";
      }
    }
?>
    <td width="100%" valign="top">
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td class="productinfo_header">
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top" align="left" class="pageHeading">
                <?php
                /* bof catdesc for bts1a, replacing "echo HEADING_TITLE;" by "topics_heading_title" */
                if ( tep_not_null($topic['topics_heading_title']) ) {
                  echo $topic['topics_heading_title'];
                } else {
                  echo HEADING_TITLE;
                }

             if (isset($_GET['authors_id'])) {
               $author_query = tep_db_query("select au.authors_name, aui.authors_description, aui.authors_url from " . TABLE_AUTHORS . " au, " . TABLE_AUTHORS_INFO . " aui where au.authors_id = '" . (int)$_GET['authors_id'] . "' and au.authors_id = aui.authors_id and aui.languages_id = '" . (int)$languages_id . "'");
               $authors = tep_db_fetch_array($author_query);
               $author_name = $authors['authors_name'];
               $authors_description = $authors['authors_description'];
               $authors_url = $authors['authors_url'];

               echo TEXT_ARTICLES_BY . $author_name;
             }

           /* eof catdesc for bts1a */
           ?>
                </td>
                <?php
// optional Article List Filter
    if (ARTICLE_LIST_FILTER) {
      if (isset($_GET['authors_id'])) {
        $filterlist_sql = "select distinct t.topics_id as id, td.topics_name as name from " . TABLE_ARTICLES . " a, " . TABLE_ARTICLES_TO_TOPICS . " a2t, " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where a.articles_status = '1' and a.articles_id = a2t.articles_id and a2t.topics_id = t.topics_id and a2t.topics_id = td.topics_id and td.language_id = '" . (int)$languages_id . "' and a.authors_id = '" . (int)$_GET['authors_id'] . "' order by td.topics_name";
      } else {
        $filterlist_sql= "select distinct au.authors_id as id, au.authors_name as name from " . TABLE_ARTICLES . " a, " . TABLE_ARTICLES_TO_TOPICS . " a2t, " . TABLE_AUTHORS . " au where a.articles_status = '1' and a.authors_id = au.authors_id and a.articles_id = a2t.articles_id and a2t.topics_id = '" . (int)$current_topic_id . "' order by au.authors_name";
      }
      $filterlist_query = tep_db_query($filterlist_sql);
      if (tep_db_num_rows($filterlist_query) > 1) {
        echo '<td align="right" class="main">' . tep_draw_form('filter', FILENAME_ARTICLES, 'get') . TEXT_SHOW . '&nbsp;';
        if (isset($_GET['authors_id'])) {
          echo tep_draw_hidden_field('authors_id', $_GET['authors_id']);
          $options = array(array('id' => '', 'text' => TEXT_ALL_TOPICS));
        } else {
          echo tep_draw_hidden_field('tPath', $tPath);
          $options = array(array('id' => '', 'text' => TEXT_ALL_AUTHORS));
        }
        echo tep_draw_hidden_field('sort', $_GET['sort']);
        while ($filterlist = tep_db_fetch_array($filterlist_query)) {
          $options[] = array('id' => $filterlist['id'], 'text' => $filterlist['name']);
        }
        echo tep_draw_pull_down_menu('filter_id', $options, (isset($_GET['filter_id']) ? $_GET['filter_id'] : ''), 'onchange="this.form.submit()"');
        echo '</form></td>' . "\n";
      }
    }
?>
              </tr>
              <?php if ( tep_not_null($topic['topics_description']) ) { ?>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
              <tr>
                <td align="left" colspan="2" class="main"><?php echo $topic['topics_description']; ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
              <?php } ?>
              <?php if (tep_not_null(isset($authors_description))) { ?>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
              <tr>
                <td class="main" colspan="2" valign="top"><?php echo $authors_description; ?></td>
              </tr>
                <?php } ?>
                <?php if ( (tep_not_null(isset($authors_url))) && ($authors_url<>'') ) { ?>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="main" colspan="2" valign="top"><?php echo sprintf(TEXT_MORE_INFORMATION, $authors_url); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <?php } ?>
            </table>
          </td>
        </tr>
        <tr>
          <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
        </tr>
        <tr>
          <td class="content_text">
            <?php include(DIR_WS_MODULES . FILENAME_ARTICLE_LISTING); ?>
          </td>
        </tr>
      </table>
    </td>
    <?php
  } else { // default page
?>
    <td width="100%" valign="top">
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td class="productinfo_header">
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
        </tr>
      </table>
      <table border="0" width="100%" cellspacing="0" cellpadding="0" class="content_text">
        <tr>
          <td>
            <?php include(DIR_WS_MODULES . FILENAME_ARTICLES_UPCOMING); ?>
          </td>
        </tr>
        <tr>
          <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
        </tr>
        <tr>
          <td class="main"><?php echo '<b>' . TEXT_CURRENT_ARTICLES . '</b>'; ?></td>
        </tr>
        <tr>
          <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
        </tr>
        <?php
  $articles_all_array = array();
  $articles_all_query_raw = "select a.articles_id, a.articles_date_added, ad.articles_name, ad.articles_head_desc_tag, au.authors_id, au.authors_name, td.topics_id, td.topics_name from ((" . TABLE_ARTICLES . " a), " . TABLE_ARTICLES_TO_TOPICS . " a2t) left join " . TABLE_TOPICS_DESCRIPTION . " td on a2t.topics_id = td.topics_id left join " . TABLE_AUTHORS . " au on a.authors_id = au.authors_id, " . TABLE_ARTICLES_DESCRIPTION . " ad where (a.articles_date_available IS NULL or to_days(a.articles_date_available) <= to_days(now())) and a.articles_id = a2t.articles_id and a.articles_status = '1' and a.articles_id = ad.articles_id and ad.language_id = '" . (int)$languages_id . "' and td.language_id = '" . (int)$languages_id . "' order by a.articles_date_added desc, ad.articles_name";
  $listing_sql = $articles_all_query_raw;

  //$articles_all_split = new splitPageResults($articles_all_query_raw, MAX_ARTICLES_PER_PAGE);

?>
        <tr>
          <td><?php include(DIR_WS_MODULES . FILENAME_ARTICLE_LISTING); ?></td>
        </tr>
	  
        <tr>
          <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
		    </table>
          </td>
        </tr>
      </table>
    </td>
    <?php } ?>
    <!-- body_text_eof //-->
  </tr>
</table>