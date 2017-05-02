from openerp import models, fields

class Sales(models.Model):
    _name = "laundryku.sales"
    
    def _default_name(self):
        seq = self.env['ir.sequence'].next_by_code("laundryku.sequence.sales")
        return seq
    
    def _amount(self):
        """
        Compute the total amounts of the Sale.
        """
        for order in self:
            amount_total  = 0.0
            for line in order.sales_lines :
                amount_total = amount_total + (line.product.price * line.qty)
            order.update({
                "amount_total" : amount_total
            })
            
    
    customer = fields.Many2one("laundryku.customer")
    state = fields.Selection([
        ('draft', 'Draft'), ('working', "Working"),
        ('done', "Done"), ('cancel', 'Cancelled'),
        ], copy=False, index=True, readonly=True, store=True,default="draft")
    sales_lines = fields.One2many("laundryku.sales_line", "sales")
    amount_total = fields.Float(compute='_amount')
    name = fields.Char(default=_default_name)
    
    def action_working(self):
        self.state = "working"
        
    def action_done(self):
        self.state = "done"
        
    def action_cancel(self):
        self.state = "cancel"
    
class SalesLine(models.Model):
    _name = "laundryku.sales_line"
    
    qty = fields.Float()
    sales = fields.Many2one("laundryku.sales")
    product = fields.Many2one("laundryku.product")