<h1>alumno dashboord</h1>
<script>
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    <?php unset($_SESSION['USER']);?>
  }
}).then(function() {
        window.location.href = "/index.php";
})
</script>