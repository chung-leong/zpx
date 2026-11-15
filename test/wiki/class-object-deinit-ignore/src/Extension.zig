const php = @import("php/root.zig");

pub const @"export Example" = php.Class.Custom(struct {
    pub fn init() !@This() {
        return .{ .text = "Static text" };
    }

    pub fn deinit(self: *@This()) void {
        // free all fields except 'text'
        php.util.freeStructFields(self.*, &.{.text});
    }

    pub const @"get integers" = php.Object.getter(@This(), .integers);
    pub const @"set integers" = php.Object.setter(@This(), .integers);

    pub const @"get floats" = php.Object.getter(@This(), .floats);
    pub const @"set floats" = php.Object.setter(@This(), .floats);

    text: []const u8,
    integers: []i32 = &.{},
    floats: []f32 = &.{},
});
