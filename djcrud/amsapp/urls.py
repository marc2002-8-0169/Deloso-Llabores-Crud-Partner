from django.urls import path
from . import views

urlpatterns = [

    path('main/', views.main, name='main'),
    path('signup/', views.signup, name='signup'),
    path('login/', views.login, name='login'),
    path('add/', views.add, name='add'),
    path('addstudent/', views.addstudent, name='addstudent'),
    path('delete/<int:assignment_id>', views.delete, name='delete'),
    path('update/<int:assignment_id>', views.update, name='update'),
    path('studentupdate/<int:student_id>', views.studentupdate, name='studentupdate'),
    path('studentinfo/', views.studentinfo, name='studentinfo'),

]