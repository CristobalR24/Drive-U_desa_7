(function() {
  $(function() {
    return $('[data-toggle]').on('click', function() {
      var toggle;
      toggle = $(this).addClass('active').attr('data-toggle');
      $(this).siblings('[data-toggle]').removeClass('active');
      return $('.surveys').removeClass('grid list').addClass(toggle);
    });
  });

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFBQSxDQUFBLENBQUUsUUFBQSxDQUFBLENBQUE7V0FDQSxDQUFBLENBQUUsZUFBRixDQUFrQixDQUFDLEVBQW5CLENBQXNCLE9BQXRCLEVBQStCLFFBQUEsQ0FBQSxDQUFBO0FBQ2pDLFVBQUE7TUFBSSxNQUFBLEdBQVMsQ0FBQSxDQUFFLElBQUYsQ0FBTyxDQUFDLFFBQVIsQ0FBaUIsUUFBakIsQ0FBMEIsQ0FBQyxJQUEzQixDQUFnQyxhQUFoQztNQUNULENBQUEsQ0FBRSxJQUFGLENBQU8sQ0FBQyxRQUFSLENBQWlCLGVBQWpCLENBQWlDLENBQUMsV0FBbEMsQ0FBOEMsUUFBOUM7YUFDQSxDQUFBLENBQUUsVUFBRixDQUFhLENBQUMsV0FBZCxDQUEwQixXQUExQixDQUFzQyxDQUFDLFFBQXZDLENBQWdELE1BQWhEO0lBSDZCLENBQS9CO0VBREEsQ0FBRjtBQUFBIiwic291cmNlc0NvbnRlbnQiOlsiJCAtPlxuICAkKCdbZGF0YS10b2dnbGVdJykub24oJ2NsaWNrJywgLT5cbiAgICB0b2dnbGUgPSAkKHRoaXMpLmFkZENsYXNzKCdhY3RpdmUnKS5hdHRyKCdkYXRhLXRvZ2dsZScpXG4gICAgJCh0aGlzKS5zaWJsaW5ncygnW2RhdGEtdG9nZ2xlXScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKVxuICAgICQoJy5zdXJ2ZXlzJykucmVtb3ZlQ2xhc3MoJ2dyaWQgbGlzdCcpLmFkZENsYXNzKHRvZ2dsZSlcbiAgKSJdfQ==
//# sourceURL=coffeescript