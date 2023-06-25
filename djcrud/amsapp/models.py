from django.forms import ModelForm, Textarea
from django.db import models

# Create your models here.
class Assignment(models.Model):
    id = models.CharField(max_length=30)
    name = models.CharField(max_length=50)
    