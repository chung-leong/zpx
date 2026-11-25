const std = @import("std");

const php = @import("php/root.zig");

pub const @"export Example" = php.Class.Custom(struct {
    pub fn init() @This() {
        return .{ .list = .empty };
    }

    pub fn deinit(self: *@This()) void {
        self.list.deinit(php.allocator);
    }

    pub const @"get list" = php.Object.proxy(@This(), .list);

    list: std.ArrayList([]const u8),
});
