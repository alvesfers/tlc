
    function expandMenu() {
      var sidebar = document.getElementById('sidebar');
      var content = document.getElementById('content');
      var options = document.getElementById('userOptions');
      var option = document.getElementById('userOption');
      if (option.style.display === 'none') {
        option.style.display = 'flex';
      } else {
        option.style.display = 'none';
      }
      sidebar.classList.toggle('sidebar-expanded');
      content.classList.toggle('content-expanded');
      options.style.display = 'none';
    }

    function toggleOptions() {
      var options = document.getElementById('userOptions');
      options.style.display = options.style.display === 'none' ? 'block' : 'none';
    }
