// <script type="text/javascript">
//     $(document).ready(function () {
//         //paginate in ajax
//         $(document).on('click', '.pagination a', function(e) {
//             e.preventDefault();
//             var url = $(this).attr('href');
//             getVacancies(url);
//             window.history.pushState("", "", url);
//         });
//         function getVacancies(url) {
//             $.ajax({
//                 url : url
//             }).done(function (data) {
//                 $('.test').html(data);
//             }).fail(function () {
//                 alert('Vacancies could not be loaded.');
//             });
//         }
//     });
// </script>