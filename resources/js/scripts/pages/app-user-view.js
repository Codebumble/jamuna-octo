/*=========================================================================================
    File Name: app-user-view.js
    Description: User View page
    --------------------------------------------------------------------------------------
    Item Name: Project-Octa - Codebumble - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Codebumble
    Author URL: http://www.codebumble.net
==========================================================================================*/
(function () {
  const suspendUser = document.querySelector('.suspend-user');

  // Suspend User javascript
  if (suspendUser) {
    suspendUser.onclick = function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert user!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Suspend user!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Suspended!',
            text: 'User has been suspended.',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Cancelled Suspension :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    };
  }

  //? Billing page have multiple buttons
  // Cancel Subscription alert
  const cancelSubscription = document.querySelectorAll('.deactivate-account');

  // Alert With Functional Confirm Button
  if (cancelSubscription) {
    cancelSubscription.forEach(cancelBtn => {
      cancelBtn.onclick = function () {
        Swal.fire({
          text: 'Are you sure you would like to Delete Your Account',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
          },
          buttonsStyling: false
        }).then(function (result) {
          if (result.value) {
            Swal.fire({
              icon: 'success',
              title: 'Deleted!',
              text: 'Your Acoount Has Been Deleted Soon.',
              customClass: {
                confirmButton: 'btn btn-success'
              }

            });

            var formData = new FormData();
              formData.append("action", "delete");

              var xhr = new XMLHttpRequest();
              xhr.open('GET', '/admin/delete-user', true);

          xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
              var percentComplete = (e.loaded / e.total) * 100;
              console.log(percentComplete + '% uploaded');
            }
          };

          xhr.onload = function() {
            if (this.status == 200) {
              location.href=JSON.parse(this.response).data;
            };
          };
          xhr.send(formData);

          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Cancelled',
              text: 'Delete Process Cancelled!!',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          }
        });
      };
    });
  }
})();
