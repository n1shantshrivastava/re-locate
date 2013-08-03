
<style type="text/css">
    .repagination.repaginate {
        float: right;
    }

    .repagination li {
        float: left;
        padding: 0 14px;
        line-height: 34px;
        text-decoration: none;
        border: 1px solid #DDD;
        border-left-width: 0;
        list-style: none;
    }

    .repagination li:first-child {
        border-left-width: 1px;
    }

    .repagination a {
        float: left;
        padding: 0;
        line-height: 34px;
        text-decoration: none;
        border: none;
        border-left-width: 0;
    }
</style>

<div class="repagination repaginate">
    <ul>
        <li> <?php  echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'prev')); ?></li>
        <li> <?php  echo $this->Paginator->numbers(array('separator' => '</li><li>')); ?></li>
        <li> <?php  echo $this->Paginator->next(__('next'), array(), null, array('class' => 'next')); ?></li>

    </ul>
</div>