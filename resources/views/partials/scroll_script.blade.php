<script src="{{ asset('js/jquery.jscroll.js') }}"></script>
<script type="text/javascript">
  $('ul.pagination').hide();
  $(function() {
    $('.iscroll').jscroll({
      autoTrigger: true,
      padding: 10,
      loadingHtml: '<center><img src="{{ asset('images/assets/loading.gif') }}" style="padding-top: 40px;" alt="Loading..." /></center>',
      nextSelector: '.pagination li.active + li a',
      contentSelector: 'div.iscroll',
      callback: function() {
        $('ul.pagination').remove();
      }
    });
  });
</script>