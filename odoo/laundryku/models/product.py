from openerp import models, fields

class Product(models.Model):
    _name = "laundryku.product"
    
    name = fields.Char()
    price = fields.Float()