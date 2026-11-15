const php = @import("php/root.zig");

pub const @"export Example" = php.Class.Custom(struct {
    pub fn deinit(_: *@This()) void {
        php.print("deinit\n", .{});
    }
});
