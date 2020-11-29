<div>
  <div class="span4"></div>
  <div class="span4">
    <?php echo validation_errors(); ?>
    <form class="form-horizontal" action="/index.php/board/registerboard" method="post">
      <div class="control-group">
        <label class="control-label" for="boardContent">게시글</label>
        <div class="controls">
          <input type="text" id="boardContent" name="boardContent" value="<?php echo set_value('boardContent'); ?>"  placeholder="게시글">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <input type="submit" class="btn btn-primary" value="게시글등록" />
        </div>
      </div>
    </form>
  </div>
  <div class="span4"></div>
</div>
