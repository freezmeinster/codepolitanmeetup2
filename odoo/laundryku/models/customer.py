from openerp import models, fields

class Customer(models.Model):
    _name = 'laundryku.customer'
    _description = 'For storing Customer Data'
    
    name = fields.Char()
    phone = fields.Char()
    address = fields.Text()