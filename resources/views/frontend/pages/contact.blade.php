{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.index` --}}
@section('custom-scripts')
<script>
  // Khai báo controller `contactController`
  app.controller('contactController', function ($scope, $http) {
    // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
    $scope.submitContactForm = function () {
      // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
      if ($scope.contactForm.$valid) {
        // lấy data của Form
        var dataInputContactForm = {
          "email": $scope.contactForm.email.$viewValue,
          "message": $scope.contactForm.message.$viewValue,
          "_token": "{{ csrf_token() }}",
        };
        // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.contact.sendMailContactForm`
        $http({
          url: "{{ route('frontend.contact.sendMailContactForm') }}",
          method: "POST",
          data: JSON.stringify(dataInputContactForm)
        }).then(function successCallback(response) {
            // Gởi mail thành công, thông báo cho khách hàng biết
            swal('Gởi mail thành công!', 'Chúng tôi sẽ trả lời Quý khách trong thời gian sớm nhất. Xin cám ơn!', 'success');
          }, function errorCallback(response) {
            // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
            swal('Có lỗi trong quá trình gởi mail!', 'Vui lòng thử lại sau vài phút.', 'error');
            console.log(response);
        });
      }
    };
  });
</script>
@endsection