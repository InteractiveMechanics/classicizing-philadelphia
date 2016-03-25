<?php
    $pageTitle = __('Search ') . __('(%s total)', $total_results);
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
    $searchRecordTypes = get_search_record_types();
?>

	<main class="search-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
					<h1 class="search-page-heading">Search</h1>
						<h4 class="search-results-number"><?php echo ($total_results); ?> results</h4>
							
							<form role="search" class="search-form" action="<?php echo public_url(''); ?>search">
								<?php echo search_form(array('show_advanced' => false, 'show_searchpage' => true)); ?>
                   			</form>
							
						
							
							
							

					
    <!--<h5><?php echo search_filters(); ?></h5>-->
    <?php if ($total_results): ?>
        <table id="search-results" class="table search-results-table">
            <thead>
                <tr>
                    <th><?php echo __('Record Type');?></th>
                    <th><?php echo __('Title');?></th>
                </tr>
            </thead>
            <tbody>
                <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
                <?php foreach (loop('search_texts') as $searchText): ?>
                <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                <?php $recordType = $searchText['record_type']; ?>
                <?php set_current_record($recordType, $record); ?>
                <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
                    <td class="search-results-table-row">
                        <?php echo $searchRecordTypes[$recordType]; ?>
                    </td>
                    <td class="search-results-table-row">
                        <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo pagination_links(); ?>
    <?php else: ?>
        <p><?php echo __('Your query returned no results.');?></p>
    <?php endif; ?>
<?php echo foot(); ?>